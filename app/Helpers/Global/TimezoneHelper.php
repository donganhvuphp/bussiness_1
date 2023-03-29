<?php

if (!function_exists('formatTime')) {
    /**
     * @param        $data
     * @param string $format_type
     *
     * @return string
     */
    function formatTime($data, string $format_type = "d - m - Y"): string
    {
        return date_format(date_create($data),$format_type);
    }
}
