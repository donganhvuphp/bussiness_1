<?php

namespace App\Modules\Client\Cart\Models\Traits\Attribute;

trait ShoppingSessionAttribute
{
    public function getQuantityTotalAttribute()
    {
        $count = 0;
        if ($this->shoppingItems->count()) {
            $count = $this->shoppingItems->sum('quantity');
        }

        return $count;
    }

    public function getPriceTotalAttribute()
    {
        $count = 0;
        if ($this->shoppingItems->count()) {
            $count = $this->shoppingItems->sum('price');
        }

        return $count;
    }
}
