<?php

namespace Src\Products\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class CreateProductDto extends DataTransferObject
{
    public string $name;
    public float $price;
}
