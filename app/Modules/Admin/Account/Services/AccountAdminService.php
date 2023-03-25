<?php

namespace App\Modules\Admin\Account\Services;

use App\Modules\Admin\Account\Interfaces\AccountAdminInterface;
use App\Modules\Admin\Account\Models\Admin;
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
    /**
     * AccountAdminService constructor.
     *
     * @param Admin $admin
     */
    public function __construct(Admin $admin)
    {
        $this->model = $admin;
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
}
