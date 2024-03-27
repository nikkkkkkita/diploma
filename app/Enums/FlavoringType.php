<?php

namespace App\Enums;

enum FlavoringType: string
{
    case AEROSOL = 'aerosol';
    case VISCOSE = 'viscose';
    case GEL = 'gel';
    case SMOKE = 'smoke';
    case LIQUID = 'liquid';
    case IONIC = 'ionic';
    case NATURAL = 'natural';
    case SPRAY = 'spray';

    public static function getFlavoringType(FlavoringType $fType):string
    {
        $fTypes = [
            FlavoringType::AEROSOL->value=>'Аэрозоль',
            FlavoringType::VISCOSE->value=>'Вискозный',
            FlavoringType::GEL->value=>'Гелевый',
            FlavoringType::SMOKE->value=>'Дым',
            FlavoringType::LIQUID->value=>'Жидкий',
            FlavoringType::IONIC->value=>'Ионный',
            FlavoringType::NATURAL->value=>'Натуральный',
            FlavoringType::SPRAY->value=>'Спрей',
        ];
        return $fTypes[$fType->value];
    }

    public static function toArray(): array
    {
        $fTypes = FlavoringType::cases();
        foreach ($fTypes as $fType) {
            $flavoringTypes [] = [
                'value' => $fType->value,
                'name' => FlavoringType::getFlavoringType($fType),
            ];
        }
        return $flavoringTypes;
    }
}
