<?php

namespace App\Modules\Admin\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
//        Auth::guard('admin')->logout();
    }

    public function index()
    {
//        Auth::guard('admin')->logout();
        return view('admin.dashboard.index');
    }
}
