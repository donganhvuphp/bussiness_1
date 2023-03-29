<?php

namespace App\Modules\Admin\Category\Interfaces;
use Illuminate\Http\Request;

/**
 * Interface CategoryInterface
 *
 * @package App\Modules\Admin\Category\Interfaces
 */
interface CategoryInterface
{
    /**
     * @param Request $request
     *
     * @return bool
     */
    public function handleCategory(Request $request): bool;

    /**
     * @param Request $request
     */
    public function search(Request $request);
}
