<?php

namespace App\Modules\Admin\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Brand\Interfaces\BrandInterface;
use App\Modules\Admin\Category\Interfaces\CategoryInterface;
use App\Modules\Admin\Order\Services\OrderService;
use App\Modules\Admin\Product\Interfaces\ProductInterface;
use App\Modules\Client\Cart\Models\ShoppingSession;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class OrderController extends Controller
{
    protected $orderService;
    protected  $brandInterface;
    protected  $productInterface;
    protected  $categoryInterface;

    /**
     * @param OrderService $orderService
     * @param BrandInterface $brandInterface
     * @param ProductInterface $productInterface
     * @param CategoryInterface $categoryInterface
     */
    public function __construct(
        OrderService $orderService,
        BrandInterface $brandInterface,
        ProductInterface $productInterface,
        CategoryInterface $categoryInterface
    ) {
        $this->orderService = $orderService;
        $this->brandInterface = $brandInterface;
        $this->productInterface = $productInterface;
        $this->categoryInterface = $categoryInterface;
    }

    /**
     * @param ShoppingSession $id
     * @return Application|Factory|View
     */
    public function store(ShoppingSession $id): Application|Factory|View
    {
        $this->orderService->store($id);

        $brands = $this->brandInterface->getPublish();
        $categories = $this->categoryInterface->getPublish();
        $productIsFeatured = $this->productInterface->getIsFeatured();

        return view('client.home.index', compact('brands', 'categories', 'productIsFeatured'));
    }
}
