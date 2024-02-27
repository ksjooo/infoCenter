<?php

namespace Src\Products\Actions;

use App\Models\Product;
use Src\Products\DTO\UpdateProductDto;

class UpdateProductAction
{
    public function __invoke(Product $product, UpdateProductDto $dto): string
    {
        $dto = array_diff($dto->toArray(), [null]);

        $product->save($dto);

        return $product->id;
    }
}
