<?php

namespace Src\Orders\DTO;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use Src\Orders\DTO\Casters\OrderStatusCaster;

class CreateOrderDto extends DataTransferObject
{
    public string $title;
    public string $description;
    public string $cabinet;
    #[CastWith(OrderStatusCaster::class)]
    public ?string $status;
    public ?string $initiator_id;
    public ?string $initiator_name;
    public ?string $acceptor_id;
}
