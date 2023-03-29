<?php

namespace App\Modules\Admin\Category\Services;

use App\Modules\Admin\Category\Interfaces\CategoryInterface;
use App\Modules\Admin\Category\Models\Category;
use App\Services\BaseService;
use Illuminate\Http\Request;

/**
 * Class CategoryService
 *
 * @package App\Modules\Admin\Account\Services
 */
class CategoryService extends BaseService implements CategoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function handleCategory(Request $request): bool
    {
        if ($request->id) {
           return $this->getById($request->id)->update($request->only('name'));
        }
        return (bool) $this->create($request->only('name'));
    }

    /**
     * @param Request $request
     *
     */
    public function search(Request $request)
    {
        return $this->paginate(PAGE_RECORD);
    }
}
