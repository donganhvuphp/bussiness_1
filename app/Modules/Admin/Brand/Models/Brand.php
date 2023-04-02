<?php

namespace App\Modules\Admin\Brand\Models;

use App\Modules\Admin\Brand\Models\Traits\Scope\BrandScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, BrandScope;

    protected $table = 'brands';

    protected $fillable = [
        'name'
    ];
}
