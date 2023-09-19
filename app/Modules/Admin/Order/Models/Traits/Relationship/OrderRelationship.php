<?php

namespace App\Modules\Admin\Order\Models\Traits\Relationship;

use App\Modules\Admin\Order\Models\OrderItem;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait OrderRelationship
{
    /**
     * @return HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
