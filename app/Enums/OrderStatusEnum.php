<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case PAID = 'paid';
    case ASSEMBLED = 'assembled';
    case SENT = 'sent';
    case DELIVERED = 'delivered';
    case ERROR = 'error';

    public static function getOrderStatusName(OrderStatusEnum $orderStatus): string
    {
        $orderStatusNames = [
            self::PAID->value => 'Оплачено',
            self::ASSEMBLED->value => 'В сборке',
            self::SENT->value => 'Отправлено',
            self::DELIVERED->value => 'Доставлено',
            self::ERROR->value => 'Ошибка',
        ];
        return $orderStatusNames[$orderStatus->value];
    }

    public static function toArray()
    {
        $statusCodes = self::cases();
        $arr = [];
        foreach ($statusCodes as $code) {
            $arr[] = [
                'value' => $code->value,
                'name' => self::getOrderStatusName($code)
            ];
        }
        return $arr;
    }

    public static function availableStatuses(string $status): array
    {
        switch ($status) {
            case self::PAID->value:
                $availableStatuses = [[
                    'value' => self::ASSEMBLED->value,
                    'name' => self::getOrderStatusName(self::ASSEMBLED)
                ], [
                    'value' => self::ERROR->value,
                    'name' => self::getOrderStatusName(self::ERROR)
                ]];
                break;
            case self::ASSEMBLED->value:
                $availableStatuses = [[
                    'value' => self::SENT->value,
                    'name' => self::getOrderStatusName(self::SENT)
                ], [
                    'value' => self::ERROR->value,
                    'name' => self::getOrderStatusName(self::ERROR)
                ]];
                break;
            case self::SENT->value:
                $availableStatuses = [[
                    'value' => self::DELIVERED->value,
                    'name' => self::getOrderStatusName(self::DELIVERED)
                ], [
                    'value' => self::ERROR->value,
                    'name' => self::getOrderStatusName(self::ERROR)
                ]];
                break;
            case self::DELIVERED->value:
                $availableStatuses = [[
                    'value' => self::ERROR->value,
                    'name' => self::getOrderStatusName(self::ERROR)
                ]];
                break;
            case self::ERROR->value:
                $availableStatuses = [[
                    'value' => self::PAID->value,
                    'name' => self::getOrderStatusName(self::PAID)
                ], [
                    'value' => self::ASSEMBLED->value,
                    'name' => self::getOrderStatusName(self::ASSEMBLED)
                ], [
                    'value' => self::SENT->value,
                    'name' => self::getOrderStatusName(self::SENT)
                ], [
                    'value' => self::DELIVERED->value,
                    'name' => self::getOrderStatusName(self::DELIVERED)
                ]];
                break;
            default:
                $availableStatuses = [];
                break;
        }

        return $availableStatuses;
    }
}
