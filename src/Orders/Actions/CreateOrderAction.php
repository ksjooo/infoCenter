<?php

namespace Src\Orders\Actions;

use App\Models\Order;
use Src\Orders\DTO\CreateOrderDto;

class CreateOrderAction
{
    public function __invoke(CreateOrderDto $dto): string
    {
        $order = new Order($dto->toArray());

        $order->save();

        return $order->id;
    }
}
