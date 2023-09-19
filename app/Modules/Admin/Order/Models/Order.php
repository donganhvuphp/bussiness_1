<?php

namespace App\Modules\Admin\Order\Models;


use App\Modules\Admin\Order\Models\Traits\Relationship\OrderRelationship;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use OrderRelationship;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'quantity_total',
        'price_total',
        'status',
        'note',
    ];
}
