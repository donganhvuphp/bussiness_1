<?php

namespace App\Modules\Client\Cart\Services;

use App\Modules\Client\Cart\Models\ShoppingItem;
use App\Services\BaseService;

class ShoppingItemService extends BaseService
{
    /**
     * @param ShoppingItem $shoppingItem
     */
    public function __construct(ShoppingItem $shoppingItem)
    {
        $this->model = $shoppingItem;
    }

    /**
     * @param $shopping_session_id
     * @param $product_id
     * @param $quantity
     * @param $size
     * @param $price
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createShoppingItem(
        $shopping_session_id,
        $product_id,
        $quantity,
        $size,
        $price,
    ) {
        return $this->create([
            'shopping_session_id' =>  $shopping_session_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'size' => $size,
            'price' => $price * $quantity,
        ]);
    }

    /**
     * @param $shopping_session_id
     * @param $product_id
     * @param $size
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function checkExistTheProductInCart(
        $shopping_session_id,
        $product_id,
        $size
    ) {
        return $this->where('shopping_session_id', $shopping_session_id)
            ->where('product_id', $product_id)
            ->where('size', $size)
            ->first();
    }
}
