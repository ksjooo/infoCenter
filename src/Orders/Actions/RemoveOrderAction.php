<?php

namespace Src\Orders\Actions;

use App\Models\Order;

class RemoveOrderAction
{
    public function __invoke(Order $order): string
    {
        $order->delete();

        return $order->id;
    }
}
