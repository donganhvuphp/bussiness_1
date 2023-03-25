<?php

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

if (!function_exists('getFileUrl')) {
    /**
     * @param $disk
     * @param $url
     *
     * @return string
     */
    function getFileUrl($disk, $url): string
    {
        return Storage::disk($disk)->url($url);
    }
}

if (!function_exists('adminInfo')) {
    /**
     * @return Guard|StatefulGuard
     */
    function adminInfo(): Guard|StatefulGuard
    {
        return Auth::guard('admin');
    }
}
