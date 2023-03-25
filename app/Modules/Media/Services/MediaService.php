<?php

namespace App\Modules\Media\Services;

use App\Modules\Media\Interfaces\MediaInterface;
use App\Modules\Media\Models\Media;
use App\Services\BaseService;
use Illuminate\Support\Facades\Storage;
use Plank\Mediable\Exceptions\MediaUploadException;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\MediaUploader;

/**
 * Class MediaService
 *
 * @package App\Modules\Media\Services
 */
class MediaService extends BaseService implements MediaInterface
{
    use HandlesMediaUploadExceptions;

    protected MediaUploader $mediaUploader;

    /**
     * MediaService constructor.
     *
     * @param Media         $media
     * @param MediaUploader $mediaUploader
     */
    public function __construct(Media $media, MediaUploader $mediaUploader)
    {
        $this->model = $media;
        $this->mediaUploader = $mediaUploader;
    }

    /**
     * @param        $file
     * @param string $disk
     * @param null   $directory
     *
     * @return \Plank\Mediable\Media
     * @throws \Exception
     */
    public function upload($file, $disk = 'public', $directory = null): \Plank\Mediable\Media
    {
        try {
            return $this->mediaUploader
                ->fromSource($file)
                ->toDestination($disk, $directory)
                ->useHashForFilename()
                ->upload();
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }
    }

    /**
     * @param $media
     *
//     * @return bool
     */
    public function deleteExistingFile($media)
    {
        return Storage::disk($media->disk)->delete($media->getDiskPath());
    }
}
