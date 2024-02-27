<?php

namespace Src\Users\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Src\Users\DTO\ForgotPasswordDto;

class ForgotPasswordAction
{
    public function __invoke(ForgotPasswordDto $dto): bool
    {
        $status = Password::sendResetLink(['email' => $dto->email]);

        return $status == Password::RESET_LINK_SENT;
    }
}
