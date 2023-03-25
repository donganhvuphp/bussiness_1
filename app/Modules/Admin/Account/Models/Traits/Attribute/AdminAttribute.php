<?php

namespace App\Modules\Admin\Account\Models\Traits\Attribute;

/**
 * Trait AdminAttribute.
 */
trait AdminAttribute
{
    /**
     * @return mixed
     */
    public function getAvatarAttribute(): mixed
    {
        return $this->getMedia(self::TAG_AVATAR)->first()->getUrl() ?? asset('admin_assets/images/avatar.jpeg');
    }
}
