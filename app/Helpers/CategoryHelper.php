<?php

namespace App\Helpers;

class CategoryHelper
{
    public static function getEnglishTag(string $name)
    {
        $names = [
            'Свеча' => 'candle',
            'Диффузор' => 'diffuser'
        ];
        return $names[$name];
    }
}
