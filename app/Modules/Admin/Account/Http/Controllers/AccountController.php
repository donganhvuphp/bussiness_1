<?php

namespace App\Modules\Admin\Account\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Account\Interfaces\AccountAdminInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        !Auth::guard('admin')->check() ?: redirect()->route('admin.dashboard.index');
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
        return view('admin.profile.index');
    }
}
