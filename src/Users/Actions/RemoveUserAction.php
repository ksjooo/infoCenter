<?php

namespace Src\Users\Actions;

use App\Models\User;

class RemoveUserAction
{
    public function __invoke(User $user): string
    {
        $user->delete();

        return $user->id;
    }
}
