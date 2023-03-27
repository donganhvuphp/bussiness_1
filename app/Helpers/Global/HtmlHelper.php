<?php

if (! function_exists('htmlLang')) {
    /**
     * @return string|array
     */
    function htmlLang(): string|array
    {
        return str_replace('_', '-', app()->getLocale());
    }
}
