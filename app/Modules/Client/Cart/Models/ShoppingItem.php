<?php

namespace App\Modules\Client\Cart\Models;

use App\Modules\Client\Cart\Models\Traits\Relationship\ShoppingItemRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingItem extends Model
{
    use HasFactory, ShoppingItemRelationship;

    protected $table = 'shopping_items';

    protected $fillable = [
        'shopping_session_id',
        'product_id',
        'quantity',
        'size',
        'price',
    ];
}

