<?php

namespace App\Modules\Client\Cart\Services;

use App\Modules\Client\Cart\Models\ShoppingSession;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

class ShoppingSessionService extends BaseService
{
    /**
     * @param ShoppingSession $shoppingSession
     */
    public function __construct(ShoppingSession $shoppingSession)
    {
        $this->model = $shoppingSession;
    }

    /**
     * @param $user_id
     * @param $quantity_total
     * @param $price_total
     * @return Model
     */
    public function createShoppingSession(
        $user_id,
        $quantity_total,
        $price_total
    ) {
        return $this->create([
            'user_id' => $user_id,
            'quantity_total' => $quantity_total,
            'price_total' => $price_total,
        ]);
    }
}
