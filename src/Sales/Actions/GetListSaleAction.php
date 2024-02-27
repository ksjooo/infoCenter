<?php

namespace Src\Sales\Actions;

use App\Models\Sale;;

class GetListSaleAction
{
    public function __invoke(): array
    {
        $sales = Sale::query()->get();

        return $sales->toArray();
    }
}
