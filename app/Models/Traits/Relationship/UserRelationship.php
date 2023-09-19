<?php

namespace App\Models\Traits\Relationship;

use App\Modules\Client\Cart\Models\ShoppingSession;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait UserRelationship
{
    /**
     * @return HasOne
     */
    public function shoppingSession(): HasOne
    {
        return $this->hasOne(ShoppingSession::class, 'user_id', 'id');
    }
}
