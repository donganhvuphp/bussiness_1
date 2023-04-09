<?php

namespace App\Modules\Admin\Product\Models\Traits\Scope;

/**
 * Trait ProductScope
 *
 * @package App\Modules\Admin\Product\Models\Traits\Scope
 */
trait ProductScope
{
    /**
     * @param $query
     * @param $request
     * @return mixed
     */
    public function scopeSearch($query, $request): mixed
    {
        return $query->when(!empty($request->key_search), function ($q) use ($request) {
            $q->where('name', 'like', '%' . escapeLike($request->key_search) . '%');
        });
    }
}
