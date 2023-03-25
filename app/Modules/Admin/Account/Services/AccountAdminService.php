<?php

namespace App\Modules\Admin\Account\Services;

use App\Modules\Admin\Account\Interfaces\AccountAdminInterface;
use App\Modules\Admin\Account\Models\Admin;
use App\Modules\Media\Interfaces\MediaInterface;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AccountAdminService
 *
 * @package App\Modules\Admin\Account\Services
 */
class AccountAdminService extends BaseService implements AccountAdminInterface
{
    protected MediaInterface $mediaInterface;

    /**
     * AccountAdminService constructor.
     *
     * @param Admin          $admin
     * @param MediaInterface $mediaInterface
     */
    public function __construct(Admin $admin, MediaInterface $mediaInterface)
    {
        $this->model = $admin;
        $this->mediaInterface = $mediaInterface;
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function login(Request $request): bool
    {
        return Auth::guard('admin')->attempt($request->only('email', 'password'));
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function updateProfile(Request $request): bool
    {
        if ($request->hasFile('avatar')) {
            $media = $this->mediaInterface->upload($request->file('avatar'), directory: 'admin');
        }
        $admin = $this->getById(adminInfo()->id());
        $update = $admin->update($request->except('file'));
        if ($update) {
            if(isset($media) && $admin->hasMedia(Admin::TAG_AVATAR)){
                $this->mediaInterface->deleteExistingFile($admin->getMedia(Admin::TAG_AVATAR)->first());
            }
            !isset($media) ?: $admin->syncMedia($media, Admin::TAG_AVATAR);
            return true;
        }

        return false;
    }
}
