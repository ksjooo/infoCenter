<?php

namespace Src\Users\Actions;

use App\Models\User;
use Src\Users\DTO\CreateUserDto;
use Src\Users\Enums\UserRolesEnum;

class CreateUserAction
{
    public function __invoke(CreateUserDto $dto): string
    {
        $dto->role = $dto->role ?? UserRolesEnum::USER()->value;

        $user = new User($dto->toArray());

        $user->save();
        $user = $user->refresh();

        return $user->id;
    }
}
