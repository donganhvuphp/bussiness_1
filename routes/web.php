<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix'     => '/',
        'as'         => 'client.home.',
    ],
    function () {
        includeRouteFiles(__DIR__.'/client/home/');
    }
);

/*
 * Fallback Route
 */
Route::fallback(function () {
    return redirect()->route(homeRoute())->withFlashDanger(__('Đường dẫn không tồn tại trong hệ thống.'));
});
