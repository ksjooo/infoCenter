<?php

namespace Src\Orders\DTO\Casters;

use Spatie\DataTransferObject\Caster;
use Src\Orders\Enums\OrderStatusEnum;

class OrderStatusCaster implements Caster
{
    /**
     * @param mixed $value
     * @return string
     */
    public function cast(mixed $value): string
    {
        return OrderStatusEnum::tryFrom($value) ? OrderStatusEnum::from($value)->value : OrderStatusEnum::USER()->value;
    }
}
