<?php

namespace App\Modules\Media\Interfaces;

/**
 * Interface AccountAdminInterface
 *
 * @package App\Modules\Admin\Account\Interfaces
 */
interface MediaInterface
{
    /**
     * @param $file
     * @param $disk
     * @param $directory
     */
    public function upload($file, $disk = null, $directory = null);

    /**
     * @param $media
     *
     */
    public function deleteExistingFile($media);
}
