<?php

namespace App\Helpers;

use Illuminate\Support\Arr;

class Week
{
    static function convert(int $day)
    {
        $list = [
            'Saturday',
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
        ];
        return Arr::get($list, $day);
    }
}
