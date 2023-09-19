<?php

namespace App\Modules\Client\Cart\Models\Traits\Relationship;
use App\Modules\Client\Cart\Models\ShoppingItem;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait ShoppingSessionRelationship
{
    /**
     * @return HasMany
     */
    public function shoppingItems(): HasMany
    {
        return $this->hasMany(
            ShoppingItem::class,
            'shopping_session_id',
            'id'
        );
    }
}
