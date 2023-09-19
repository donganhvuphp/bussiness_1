<?php

namespace App\Modules\Admin\Order\Interfaces;

use App\Modules\Client\Cart\Models\ShoppingSession;

interface OrderInterface
{
    public function store(ShoppingSession $shoppingSession);
}
