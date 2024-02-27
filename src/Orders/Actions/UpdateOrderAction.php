<?php

namespace Src\Orders\Actions;

use App\Models\Order;
use Src\Orders\DTO\UpdateOrderDto;

class UpdateOrderAction
{
    public function __invoke(Order $order, UpdateOrderDto $dto): string
    {
        $dto = array_diff($dto->toArray(), [null]);

        $order->update($dto);

        return $order->id;
    }
}
