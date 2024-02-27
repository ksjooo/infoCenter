<?php

namespace Src\Orders\Actions;

use App\Models\Order;

class GetOrderAction
{
    public function __invoke(Order $order): array
    {
        return $order->toArray();
    }
}
