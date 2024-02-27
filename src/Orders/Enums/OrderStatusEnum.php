<?php

namespace Src\Orders\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self PROGRESS()
 * @method static self COMPLETED()
 * @method static self CANCELED()
 */

class OrderStatusEnum extends Enum
{
    /**
     * @return array{PROGRESS: string, COMPLETED: string, CANCELED: string}
     */
    protected static function labels(): array
    {
        return [
            "PROGRESS" => "В работе",
            "COMPLETED" => "Выполнена",
            "CANCELED" => "Отменена",
        ];
    }
}
