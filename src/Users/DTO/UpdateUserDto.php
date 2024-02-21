<?php

namespace Src\Users\DTO;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use Src\Users\DTO\Casters\UserRolesCaster;

class UpdateUserDto extends DataTransferObject
{
    public ?string $name;
    public ?string $email;

    #[CastWith(UserRolesCaster::class)]
    public ?string $role;
}
