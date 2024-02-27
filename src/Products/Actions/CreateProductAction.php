<?php

namespace Src\Products\Actions;

use App\Models\Product;
use Src\Products\DTO\CreateProductDto;

class CreateProductAction
{
    public function __invoke(CreateProductDto $dto): string
    {
        $product = new Product($dto->toArray());

        $product->save();

        return $product->id;
    }
}
