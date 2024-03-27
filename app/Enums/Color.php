<?php

namespace App\Enums;

enum Color:string
{
    case BEIGE = 'beige';
    case WHITE = 'white';
    case BURGUNDY = 'burgundy';
    case YELLOW = 'yellow';
    case GREEN = 'green';
    case GOLDEN = 'golden';
    case BROWN = 'brown';
    case RED = 'red';
    case ORANGE = 'orange';
    case TRANSPARENT = 'transparent';
    case MULTICOLORED = 'multicolored';
    case PINK = 'pink';
    case SILVER = 'silver';
    case GRAY = 'gray';
    case BLUE = 'blue';
    case PURPLE = 'purple';
    case KHAKI = 'khaki';
    case BLACK = 'black';

    public static function getColor(Color $color)
    {
        $colors = [
            Color::BEIGE->value=> 'Бежевый',
            Color::WHITE->value => 'Белый',
            Color::BURGUNDY->value => 'Бордовый',
            Color::BLUE->value => 'Голубой',
            Color::YELLOW->value => 'Желтый',
            Color::GREEN->value => 'Зеленый',
            Color::GOLDEN->value => 'Золотой',
            Color::BROWN->value => 'Коричневый',
            Color::RED->value => 'Красный',
            Color::ORANGE->value => 'Оранжевый',
            Color::TRANSPARENT->value => 'Прозрачный',
            Color::MULTICOLORED->value => 'Разноцветный',
            Color::PINK->value => 'Розовый',
            Color::SILVER->value => 'Серебряный',
            Color::GRAY->value => 'Серый',
            Color::BLUE->value => 'Синий',
            Color::PURPLE->value => 'Фиолетовый',
            Color::KHAKI->value => 'Хаки',
            Color::BLACK->value => 'Черный',
        ];
        return $colors[$color->value];
    }

    public static function toArray(): array
    {
        $colors = Color::cases();
        foreach ($colors as $color) {
            $colorNames [] = [
                'value' => $color->value,
                'name' => Color::getColor($color)
            ];
        }
        return $colorNames;
    }
}
