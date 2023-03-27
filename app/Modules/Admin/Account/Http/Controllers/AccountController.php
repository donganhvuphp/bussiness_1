<?php

namespace App\Modules\Admin\Account\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Account\Http\Requests\UpdateProfileRequest;
use App\Modules\Admin\Account\Interfaces\AccountAdminInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Class AccountController
 *
 * @package App\Modules\Admin\Account\Http\Controllers
 */
class AccountController extends Controller
{
    protected AccountAdminInterface $accountAdminInterface;

    /**
     * AccountController constructor.
     *
     * @param AccountAdminInterface $accountAdminInterface
     */
    public function __construct(AccountAdminInterface $accountAdminInterface)
    {
        $this->accountAdminInterface = $accountAdminInterface;
    }

    /**
     * @return Application|Factory|View
     */
    public function loginView(): View|Factory|Application
    {
        return view('admin.auth.login');
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $auth = $this->accountAdminInterface->login($request);
        if ($auth) {
            return redirect()->route('admin.dashboard.index');
        }

        return redirect()->back();
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    /**
     * @return Application|Factory|View
     */
    public function profile(): View|Factory|Application
    {
        debug(app()->getLocale());
        return view('admin.profile.index');
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return JsonResponse
     */
    public function updateProfile(UpdateProfileRequest $request): JsonResponse
    {
        try {
            $this->accountAdminInterface->updateProfile($request);
            return $this->responseSuccess(message: 'Cập nhật hồ sơ thành công!');
        } catch (\Throwable $e) {
            Log::info($e->getMessage());
            return $this->responseFailed(message: 'Cập nhật hồ sơ thất bại!');
        }
    }
}
