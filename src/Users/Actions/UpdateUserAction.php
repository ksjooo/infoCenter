<?php

namespace Src\Users\Actions;

use App\Models\User;
use Src\Users\DTO\UpdateUserDto;

class UpdateUserAction
{
    public function __invoke(User $user, UpdateUserDto $dto): string
    {
        $dto = array_diff($dto->toArray(), [null]);
        $user->update($dto);

        return $user->id;
    }
}
