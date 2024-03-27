<?php

namespace App\Enums;

enum WickType: string
{
    case TWISTED = 'twisted';
    case WICKER = 'wicker';
    case REINFORCES = 'reinforced';
    case WAXED = 'waxed';

    case WOOD = 'wood';

    public static function getWickType(WickType $wType): string
    {
        $wTypes = [
            wickType::TWISTED->value=>'Крученный',
            wickType::WICKER->value=>'Плетеный',
            wickType::REINFORCES->value=>'Армированный',
            wickType::WAXED->value=>'Вощенный',
            wickType::WOOD->value=>'Деревянный',
        ];
        return $wTypes[$wType->value];
    }

    public static function toArray(): array
    {
        $wTypes = WickType::cases();
        foreach ($wTypes as $wType) {
            $wickTypes [] = [
                'value' => $wType->value,
                'name' => WickType::getWickType($wType),
            ];
        }
        return $wickTypes;
    }
}
