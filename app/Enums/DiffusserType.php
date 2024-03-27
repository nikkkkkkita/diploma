<?php

namespace App\Enums;

enum DiffusserType: string
{
    case AROMA = 'aroma';
    case FILLER = 'filler';
    case SPRAY = 'spray';
    case GIFT_SET = 'gist set';
    case BOTTLE = 'bottle';
    case STICKS = 'sticks';
    case PERFUME_FOR_HOME = 'perfume for home';

    public static function getDiffusserType(DiffusserType $dType): string
    {
        $dTypes = [
            diffusserType::AROMA->value=>'Ароматический диффузор',
            diffusserType::FILLER->value=>'Наполнитель для ароматического диффузора',
            diffusserType::SPRAY->value=>'Парфюмерный спрей для дома',
            diffusserType::GIFT_SET->value=>'Подарочный набор с аромадиффузором',
            diffusserType::BOTTLE->value=>'Флакон для диффузора',
            diffusserType::STICKS->value=>'Палочки для диффузора',
            diffusserType::PERFUME_FOR_HOME->value=>'Туалетная вода для дома',
        ];
        return $dTypes[$dType->value];
    }

    public static function toArray(): array
    {
        $dTypes = DiffusserType::cases();
        foreach ($dTypes as $dType) {
            $diffuserTypes [] = [
                'value' => $dType->value,
                'name' => DiffusserType::getDiffusserType($dType),
            ];
        }
        return $diffuserTypes;
    }
}
