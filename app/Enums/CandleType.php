<?php

namespace App\Enums;

enum CandleType: string
{
    case AROMATIC_CANDLE = 'aromatic candle';
    case TEA_CANDLES = 'tea candles';
    case AROMATIC_CANDLE_SET = 'aromatic candle set';
    case CANDLE = 'candle';
    case CANDLE_SET = 'candle set';

    public static function getCandleType(CandleType $type): string
    {
        $candleTypes = [
            CandleType::AROMATIC_CANDLE->value => 'Свеча ароматическая',
            CandleType::TEA_CANDLES->value => 'Чайная свеча',
            CandleType::AROMATIC_CANDLE_SET->value => 'Набор ароматических свеч',
            CandleType::CANDLE->value => 'Свеча',
            CandleType::CANDLE_SET->value => 'Набор свеч',
        ];
        return $candleTypes[$type->value];
    }

    public static function toArray(): array
    {
        $candleTypes = CandleType::cases();
        foreach ($candleTypes as $type) {
            $types [] = [
                'value' => $type->value,
                'name' => CandleType::getCandleType($type),
            ];
        }
        return $types;
    }
}
