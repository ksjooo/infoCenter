<?php

namespace Src\Orders\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class FiltersOrderDto extends DataTransferObject
{
    public string $title;
    public string $cabinet;
    public string $status;
    public ?string $initiator_id;
    public ?string $initiator_name;
    public ?string $acceptor_id;
}
