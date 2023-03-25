<?php

use App\Modules\Admin\Account\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/profile', [AccountController::class, 'profile'])
    ->name('admin.profile.index');
