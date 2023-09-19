<?php

namespace App\Modules\Client\Cart\Models;

use App\Modules\Client\Cart\Models\Traits\Attribute\ShoppingSessionAttribute;
use App\Modules\Client\Cart\Models\Traits\Relationship\ShoppingSessionRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingSession extends Model
{
    use HasFactory,
        ShoppingSessionRelationship,
        ShoppingSessionAttribute;

    protected $table = 'shopping_sessions';

    protected $fillable = [
        'user_id',
        'quantity_total',
        'price_total'
    ];
}
