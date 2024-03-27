<?php

namespace App\Enums;

enum DiffuserPlacement: string
{
    case DESKTOP = 'desktop';
    case UNIVERSAL = 'universal';

    case SUSPENSION = 'suspension';

    public static function getDiffuserPlacement(DiffuserPlacement $placement): string
    {
        $diffuserPlacements = [
            DiffuserPlacement::DESKTOP->value=>'Настольный',
            DiffuserPlacement::UNIVERSAL->value=>'Универсальный',
            DiffuserPlacement::SUSPENSION->value=>'Подвесной',
        ];
        return $diffuserPlacements[$placement->value];
    }

    public static function toArray(): array
    {
        $dPlacements = DiffuserPlacement::cases();
        foreach ($dPlacements as $dPlacement) {
            $diffuserPlacements [] = [
                'value' => $dPlacement->value,
                'name' => DiffuserPlacement::getDiffuserPlacement($dPlacement),
            ];
        }
        return $diffuserPlacements;
    }
}
