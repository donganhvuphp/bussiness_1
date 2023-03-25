<?php

use Illuminate\Support\Facades\Route;

Route::namespace('admin')->group(
    function () {
        Route::group(['middleware' => ['auth:admin']], function () {
            includeRouteFiles(__DIR__.'/admin/dashboard/');
            includeRouteFiles(__DIR__.'/admin/profile/');
        });
        Route::group(['prefix' => '/'],function () {
            includeRouteFiles(__DIR__.'/admin/auth/');
        });
    }
);

/*
 * Fallback Route
 */
Route::fallback(function () {
    return redirect()->route(homeRoute())->withFlashDanger(__('Đường dẫn không tồn tại trong hệ thống.'));
});
