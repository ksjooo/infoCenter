<?php

namespace Src\Products\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateProductDto extends DataTransferObject
{
    public ?string $name;
    public ?float $price;
}
