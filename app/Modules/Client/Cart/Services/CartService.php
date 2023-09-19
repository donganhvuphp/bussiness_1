<?php

namespace App\Modules\Client\Cart\Services;

use App\Models\User;
use App\Modules\Client\Cart\Interfaces\CartInterface;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * CartService
 */
class CartService implements CartInterface
{
    protected $shoppingSessionService;
    protected $shoppingItemService;

    /**
     * @param ShoppingSessionService $shoppingSessionService
     * @param ShoppingItemService $shoppingItemService
     */
    public function __construct(
        ShoppingSessionService $shoppingSessionService,
        ShoppingItemService $shoppingItemService
    ) {
        $this->shoppingSessionService = $shoppingSessionService;
        $this->shoppingItemService = $shoppingItemService;
    }

    /**
     * @param $product
     * @param $request
     * @return void
     */
    public function insertProductToCart($product, $request)
    {
        DB::beginTransaction();
        try {
            $shoppingSession = auth()->user()->shoppingSession;

            if (empty($shoppingSession)) {
                $shoppingSession = auth()->user()->shoppingSession()->create([
                    'quantity_total' => $request->quantity,
                    'price_total' => $request->quantity * $product->price,
                ]);
            }

            $shoppingItem = $this->shoppingItemService->checkExistTheProductInCart(
                $shoppingSession->id,
                $product->id,
                $request->size,
            );

            if (!empty($shoppingItem)) {
                $shoppingItem->update([
                    'quantity' => $quantity = $shoppingItem->quantity + $request->quantity,
                    'price' => $product->price * $quantity,
                ]);
            } else {
                $this->shoppingItemService->createShoppingItem(
                        $shoppingSession->id,
                        $product->id,
                        $request->quantity,
                        $request->size,
                        $product->price,
                );
            }

            $shoppingSession->update([
                'quantity_total' => $shoppingSession->quantityTotal,
                'price_total' => $shoppingSession->priceTotal
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error: {$e->getMessage()} --line: {$e->getLine()}");
        }

    }
}
