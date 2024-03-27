<?php

namespace App\Enums;

enum CandleComposition: string
{
    case APRICOT_WAX = 'apricot wax';
    case COCONUT_WAX = 'coconut wax';
    case OLIVE_WAX = 'olive wax';
    case PALM_WAX = 'palm wax';
    case PARAFFIN = 'paraffin';
    case BEESWAX = 'beeswax';
    case SOY_WAX = 'soy wax';

    public static function getCandleComposition(CandleComposition $composition): string
    {
        $candleComposition = [
            candleComposition::APRICOT_WAX->value=>'Абрикосовый воск',
            candleComposition::COCONUT_WAX->value=>'Кокосовый воск',
            candleComposition::OLIVE_WAX->value=>'Оливковый воск',
            candleComposition::PALM_WAX->value=>'Пальмовый воск',
            candleComposition::PARAFFIN->value=>'Парафин',
            candleComposition::BEESWAX->value=>'Пчелиный воск',
            candleComposition::SOY_WAX->value=>'Соевый воск',
        ];
        return $candleComposition[$composition->value];
    }

    public static function toArray(): array
    {
        $CandleCompositions = CandleComposition::cases();
        foreach ($CandleCompositions as $composition) {
            $compositions [] = [
                'value' => $composition->value,
                'name' => CandleComposition::getCandleComposition($composition),
            ];
        }
        return $compositions;
    }
}
