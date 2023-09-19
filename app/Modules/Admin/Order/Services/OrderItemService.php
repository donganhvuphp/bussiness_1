<?php

namespace App\Modules\Admin\Order\Services;

use App\Modules\Admin\Order\Models\OrderItem;
use App\Services\BaseService;

class OrderItemService extends BaseService
{
    public function __construct(OrderItem $orderItem)
    {
        $this->model = $orderItem;
    }
}
