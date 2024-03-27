<?php

namespace App\Enums;

enum StatusEnum: string
{
    case NEW ='new';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';

    public static function getStatusName(StatusEnum $status): string
    {
        $statusNames = [
            self::NEW->value => 'Новое',
            self::ACCEPTED->value => 'Подтверждено',
            self::REJECTED->value => 'Отклонено'
        ];
        return $statusNames[$status->value];
    }
}
