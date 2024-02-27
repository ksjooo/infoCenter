<?php

namespace Src\Orders\Actions;

use App\Models\Order;
use Src\Orders\DTO\FiltersOrderDto;

class GetListOrderAction
{
    public function __invoke(FiltersOrderDto $dto): array
    {
        $orders = Order::query()->get();

        return $orders->toArray();
    }
}
