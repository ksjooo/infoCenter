<?php

namespace Src\Products\Actions;

use App\Models\Product;
use Src\Products\DTO\CreateProductDto;

class GetListProductAction
{
    public function __invoke(): array
    {
        $product = Product::query()->get();

        return $product->toArray();
    }
}
