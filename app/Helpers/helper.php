<?php

use Carbon\Carbon;

if (!function_exists('time_ago')) {

    function time_ago($date)
    {
        if (!$date) {
            return 'Unknown time';
        }

        return Carbon::parse($date)->diffForHumans();
    }
}
