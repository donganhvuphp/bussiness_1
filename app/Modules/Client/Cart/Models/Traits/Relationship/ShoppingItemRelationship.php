<?php

namespace App\Modules\Client\Cart\Models\Traits\Relationship;

use App\Modules\Admin\Product\Models\Product;
use App\Modules\Client\Cart\Models\ShoppingSession;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ShoppingItemRelationship
{
    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(
            Product::class,
            'product_id',
            'id'
        );
    }

    /**
     * @return BelongsTo
     */
    public function shoppingSession(): BelongsTo
    {
        return $this->belongsTo(
            ShoppingSession::class,
            'shopping_session_id',
            'id'
        );
    }
}
