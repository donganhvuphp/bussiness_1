<?php

if (!function_exists('htmlLang')) {
    /**
     * @return string|array
     */
    function htmlLang(): string|array
    {
        return str_replace('_', '-', app()->getLocale());
    }
}

if (!function_exists('indexTable')) {
    /**
     * @param $currentPage
     * @param $perPage
     * @param $index
     *
     * @return string
     */
    function indexTable($currentPage, $perPage, $index): string
    {
        return ($currentPage * $perPage) - $perPage + $index + 1;
    }
}

