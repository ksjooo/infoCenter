<?php

namespace Src\Sales\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class CreateSaleDto extends DataTransferObject
{
    public ?string $seller_id;
    public array $products;
}
