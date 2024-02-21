<?php

namespace Src\Users\Actions;

use Src\Users\DTO\LoginDTO;
use Symfony\Component\HttpFoundation\Response;

class LoginAction
{
    public function __invoke(LoginDto $dto): array
    {
        $credentials = $dto->only('email', 'password')->toArray();

        if (! $token = auth('api')->attempt($credentials)) {
            abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized');
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
