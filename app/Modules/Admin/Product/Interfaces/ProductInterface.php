<?php

namespace App\Modules\Admin\Product\Interfaces;
use Illuminate\Http\Request;

/**
 * Interface ProductInterface
 *
 * @package App\Modules\Admin\Product\Interfaces
 */
interface ProductInterface
{
    /**
     * @param Request $request
     *
     * @return bool
     */
    public function handleProduct(Request $request): bool;

    /**
     * @param Request $request
     */
    public function search(Request $request);

    /**
     * @param $product
     *
     * @return mixed
     */
    public function delete($product): mixed;

    /**
     * @param $product
     *
     * @return mixed
     */
    public function show($product): mixed;
}
