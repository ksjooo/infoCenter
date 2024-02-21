<?php

namespace Src\Users\DTO\Casters;

use Spatie\DataTransferObject\Caster;
use Src\Users\Enums\UserRolesEnum;

class UserRolesCaster implements Caster
{
    /**
     * @param mixed $value
     * @return string
     */
    public function cast(mixed $value): string
    {
        return UserRolesEnum::tryFrom($value) ? UserRolesEnum::from($value)->value : UserRolesEnum::USER()->value;
    }
}
