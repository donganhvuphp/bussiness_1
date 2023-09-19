<?php

namespace App\Modules\Client\Cart\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Product\Models\Product;
use App\Modules\Client\Cart\Interfaces\CartInterface;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class CartController
 */
class CartController extends Controller
{
    protected CartInterface $cartInterface;

    /**
     * CartController constructor.
     *
     * @param CartInterface $cartInterface
     */
    public function __construct(CartInterface $cartInterface)
    {
        $this->cartInterface = $cartInterface;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $carts = optional(auth()->user()->shoppingSession)->shoppingItems;
        return view('client.cart.index', compact('carts'));
    }

    /**
     * @param Product $id
     * @param Request $request
     * @return void
     */
    public function store(Product $id, Request $request): void
    {
        $this->cartInterface->insertProductToCart($id, $request);
    }
}
