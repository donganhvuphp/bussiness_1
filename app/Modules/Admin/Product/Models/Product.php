<?php

namespace App\Modules\Admin\Product\Models;

use App\Modules\Admin\Product\Models\Traits\Attribute\ProductAttribute;
use App\Modules\Admin\Product\Models\Traits\Relationship\ProductRelationship;
use App\Modules\Admin\Product\Models\Traits\Scope\ProductScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

/**
 * Class Product
 *
 * @package App\Modules\Admin\Product\Models
 */
class Product extends Model
{
    use HasFactory, Mediable, ProductScope, ProductAttribute, ProductRelationship;

    protected $table = 'products';

    public $fillable = [
        'brand_id',
        'category_id',
        'name',
        'slug',
        'status',
        'description',
    ];

    protected $with = [
        'category',
        'brand'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public const TAG_AVATAR = 'avatar';
    public const TAG_SUB_IMAGE = 'sub_image';
}
