<?php

namespace Src\Products\Actions;

use App\Models\Product;
use Src\Products\DTO\CreateProductDto;

class RemoveProductAction
{
    public function __invoke(Product $product): string
    {
        $product->delete();

        return $product->id;
    }
}
