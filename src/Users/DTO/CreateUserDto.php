<?php

namespace Src\Users\DTO;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use Src\Users\DTO\Casters\UserRolesCaster;

class CreateUserDto extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;

    #[CastWith(UserRolesCaster::class)]
    public ?string $role;
}
