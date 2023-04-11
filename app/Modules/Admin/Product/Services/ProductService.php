<?php

namespace App\Modules\Admin\Product\Services;

use App\Modules\Admin\Product\Interfaces\ProductInterface;
use App\Modules\Admin\Product\Models\Product;
use App\Modules\Admin\Storehouse\Interfaces\StorehouseInterface;
use App\Modules\Media\Interfaces\MediaInterface;
use App\Services\BaseService;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class ProductService
 *
 * @package App\Modules\Admin\Product\Services
 */
class ProductService extends BaseService implements ProductInterface
{
    protected MediaInterface $mediaInterface;
    protected StorehouseInterface $storehouseInterface;

    public function __construct(
        Product $product,
        MediaInterface $mediaInterface,
        StorehouseInterface $storehouseInterface
    )
    {
        $this->model = $product;
        $this->mediaInterface = $mediaInterface;
        $this->storehouseInterface = $storehouseInterface;
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function handleProduct(Request $request): bool
    {
        if ($request->id) {
            $handle = $this->getById($request->id);
            $handle->update($request->only('name'));
        } else {
            $handle = $this->create($this->formatData($request->only($this->fillable())));
        }

        if ($request->storehouse) {
            $this->handleStorehouse($handle, $request->storehouse);
        }

        $this->uploadAvatar($handle, $request);
        $this->uploadSubImage($handle, $request);

        return true;
    }

    /**
     * @param $model
     * @param $storehouse
     *
     * @return bool
     */
    public function handleStorehouse($model, $storehouse): bool
    {
        if ($model) {
            $data = array_map(function ($storehouse) use($model) {
                return [
                    'product_id' => $model->id,
                    'name' => strtoupper($storehouse['name']),
                    'quantity' => $storehouse['quantity'],
                ];
            }, $storehouse);
            $model->storehouses()->delete();
            return $this->storehouseInterface->insertStorehouse($data);
        }

        return false;
    }

    /**
     * @param $params
     *
     * @return mixed
     */
    public function formatData($params): mixed
    {
        $params['status'] = INACTIVE;
        $params['slug'] = generateSlug($params['name']);

        return $params;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function search(Request $request): mixed
    {
        return $this->model::search($request)->paginate(PAGE_RECORD);
    }

    /**
     * @param $product
     *
     * @return bool|null
     * @throws Exception
     */
    public function delete($product): ?bool
    {
        return $this->deleteById($product);
    }

    /**
     * @param $product
     *
     * @return Model
     * @throws Exception
     */
    public function show($product): Model
    {
        return $this->getById($product);
    }

    /**
     * @param $request
     * @param $model
     *
     * @return void
     */
    private function uploadAvatar($model, $request): void
    {
        if ($model) {
            if ($request->hasFile('avatar')) {
                $media = $this->mediaInterface->upload($request->file('avatar'), directory: 'product');
            }
            if (!empty($media) && $model->hasMedia(Product::TAG_AVATAR)) {
                $this->mediaInterface->deleteExistingFile($model->getMedia(Product::TAG_AVATAR)->first());
            }
            empty($media) ?: $model->syncMedia($media, Product::TAG_AVATAR);
        }
    }

    /**
     * @param $request
     * @param $model
     *
     * @return void
     */
    private function uploadSubImage($model, $request): void
    {
        if ($model) {
            $media = [];
            if (!empty($request->sub_image)) {
                foreach ($request->sub_image as $sub) {
                    $upload = $this->mediaInterface->upload($sub, directory: 'product');
                    if ($upload->id) {
                        $media[] = $upload->id;
                    }
                }
            }
            if (!empty($request->sub_image_remove)) {
                $this->mediaInterface->deleteExistingFile($model->getSubImageByIdMethod($request->sub_image_remove), false);
                $model->detachMedia($request->sub_image_remove);
            }
            empty($media) ?: $model->attachMedia($media, Product::TAG_SUB_IMAGE);
        }
    }
}
