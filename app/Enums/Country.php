<?php

namespace App\Enums;

enum Country:string
{
    case RUS = 'RU';
    case USA = 'US';
    case UAE = 'AE';
    case NOR = 'NO';
    case CHN = 'CN';
    case CAN = 'CA';
    case KAZ = 'KZ';
    case ITA = 'IT';
    case TUR = 'TR';

    public static function getCountry(Country $country):string
    {
        $countries = [
            Country::RUS->value=>'Россия',
            Country::CAN->value=>'Канада',
            Country::CHN->value=>'Китай',
            Country::ITA->value=>'Италия',
            Country::KAZ->value=>'Казахстан',
            Country::TUR->value=>'Турция',
            Country::UAE->value=>'ОАЭ',
            Country::NOR->value=>'Норвегия',
            Country::USA->value=>'США',
        ];
        return $countries[$country->value];
    }

    public static function toArray(): array
    {
        $countries = Country::cases();
        foreach ($countries as $country) {
            $mCountries [] = [
                'value' => $country->value,
                'name' => Country::getCountry($country),
            ];
        }
        return $mCountries;
    }

    public static function has($selectedCountry)
    {
        foreach (array_column(self::cases(), 'value') as $value) {
            if ($value === $selectedCountry) {
                return true;
            }
        }
        return false;
    }
}
