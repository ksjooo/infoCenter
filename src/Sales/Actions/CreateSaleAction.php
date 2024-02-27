<?php

namespace Src\Sales\Actions;

use App\Models\Sale;
use Src\Sales\DTO\CreateSaleDto;

class CreateSaleAction
{
    public function __invoke(CreateSaleDto $dto): string
    {
        $sale = new Sale($dto->toArray());

        $sale->save();

        foreach ($dto->products as $product => $count) {
            $sale->product()->create(['count' => $count, 'product_id' => $product]);
        }

        return $sale->id;
    }
}
