<?php

namespace Src\Sales\Actions;

use App\Models\Sale;;

class RemoveSaleAction
{
    public function __invoke(Sale $sale): string
    {
        $sale->delete();

        return $sale->id;
    }
}
