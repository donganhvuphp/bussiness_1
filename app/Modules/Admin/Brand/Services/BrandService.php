<?php

namespace App\Modules\Admin\Brand\Services;

use App\Modules\Admin\Brand\Interfaces\BrandInterface;
use App\Modules\Admin\Brand\Models\Brand;
use App\Services\BaseService;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class BrandService
 *
 * @package App\Modules\Admin\Category\Services
 */
class BrandService extends BaseService implements BrandInterface
{
    public function __construct(Brand $brand)
    {
        $this->model = $brand;
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function handleBrand(Request $request): bool
    {
        if ($request->id) {
           return $this->getById($request->id)->update($request->only('name'));
        }
        return (bool) $this->create($request->only('name'));
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
     * @param $brand
     *
     * @return bool|null
     * @throws Exception
     */
    public function delete($brand): ?bool
    {
        return $this->deleteById($brand);
    }

    /**
     * @param $brand
     *
     * @return Model
     * @throws Exception
     */
    public function show($brand): Model
    {
        return $this->getById($brand);
    }
}
