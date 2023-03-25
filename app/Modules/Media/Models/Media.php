<?php

namespace App\Modules\Media\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Mediable\Media as Mediable;

class Media extends Mediable
{
    use SoftDeletes;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'full_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_temporary' => 'boolean',
    ];
}
