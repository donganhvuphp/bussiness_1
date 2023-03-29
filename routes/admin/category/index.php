<?php

use App\Modules\Admin\Category\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'categories'
    ],
    function () {
        Route::get('/', [CategoryController::class, 'index'])
            ->name('admin.categories.index');
        Route::post('/', [CategoryController::class, 'handle'])
            ->name('admin.categories.handle');
        Route::get('/create', [CategoryController::class, 'create'])
            ->name('admin.categories.create');
    }
);


