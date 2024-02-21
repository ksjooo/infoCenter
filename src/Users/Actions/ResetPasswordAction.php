<?php

namespace Src\Users\Actions;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Hashing\HashManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Src\Users\DTO\ForgotPasswordDto;
use Src\Users\DTO\ResetPasswordDto;

class ResetPasswordAction
{
    public function __invoke(ResetPasswordDto $dto): bool
    {
        $data = $dto->toArray();
        $rows = DB::table('password_resets')->get();
        foreach ($rows as $row) {
            if (app(HashManager::class)->check($dto->token, $row->token)) {
                $data['email'] = $row->email;
            }
        }
        if (!isset($data['email'])) {
            abort(422, 'Incorrect token');
        }
        $status = "";
        try {
            $status = Password::reset(
                $data,
                function (User $user) use ($dto) {
                    $user->forceFill([
                        'password' => $dto->password,
                        'remember_token' => Str::random(60),
                    ])->save();
                    $user->markEmailAsVerified();

                    event(new PasswordReset($user));
                }
            );
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('SEND_EMAIL_FORGOT_PASSWORD_ERROR', [
                'data' => $data,
                'code' => $e->getCode(),
                'error' => $e->getMessage(),
                'trace' => $e->getTrace(),
            ]);
            abort(500, 'Server Error');
        }

        return $status == Password::PASSWORD_RESET;
    }
}
