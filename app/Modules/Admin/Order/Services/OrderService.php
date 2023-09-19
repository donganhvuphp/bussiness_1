<?php

namespace App\Modules\Admin\Order\Services;

use App\Modules\Admin\Order\Interfaces\OrderInterface;
use App\Modules\Admin\Order\Models\Order;
use App\Modules\Client\Cart\Models\ShoppingSession;
use App\Modules\Client\Cart\Services\ShoppingSessionService;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService extends BaseService implements OrderInterface
{
    protected $shoppingSessionService;
    protected $orderItemService;
    public function __construct(
        Order $order,
        ShoppingSessionService $shoppingSessionService,
        OrderItemService $orderItemService,
    ) {
        $this->model = $order;
        $this->shoppingSessionService = $shoppingSessionService;
        $this->orderItemService = $orderItemService;
    }

    public function store(ShoppingSession $shoppingSession)
    {
        DB::beginTransaction();
        try {
            $order = $this->create([
                'user_id' => $shoppingSession->user_id,
                'quantity_total' => $shoppingSession->quantity_total,
                'price_total' => $shoppingSession->price_total
            ]);

            $shoppingItemArray = $shoppingSession->shoppingItems->toArray();

            foreach ($shoppingItemArray as $shopingItem) {
                unset($shopingItem['shopping_session_id']);
                unset($shopingItem['id']);

                $shopingItem['order_id'] = $order->id;
                $shopingItem['created_at'] = now()->toDateTimeString();
                $shopingItem['updated_at'] = now()->toDateTimeString();

                $data[] = $shopingItem;
            }

            $this->orderItemService->insert($data);

            $this->shoppingSessionService->deleteById($shoppingSession->id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error: {$e->getMessage()} --line: {$e->getLine()}");
        }
    }
}
