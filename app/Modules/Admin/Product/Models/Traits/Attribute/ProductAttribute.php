<?php

namespace App\Modules\Admin\Product\Models\Traits\Attribute;

/**
 * Trait ProductAttribute.
 */
trait ProductAttribute
{
    /**
     * @return mixed
     */
    public function getAvatarAttribute(): mixed
    {
        return optional($this->getMedia(self::TAG_AVATAR)->first())->getUrl() ?? asset('admin_assets/images/avatar.jpeg');
    }

    /**
     * @return mixed
     */
    public function getSubImageAttribute(): mixed
    {
        $result = $this->getMedia(self::TAG_SUB_IMAGE);
        return $result->map(function ($data) {
            return [
                'id' => $data->id,
                'url' => $data->getUrl(),
            ];
        });
    }

    /**
     * @return string
     */
    public function getStatusDescriptionAttribute(): string
    {
        return match ($this->status) {
            INACTIVE => 'Tạm dừng',
            ACTIVE => 'Đang bán',
        };
    }
}
