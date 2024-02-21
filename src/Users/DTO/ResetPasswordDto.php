<?php

namespace Src\Users\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ResetPasswordDto extends DataTransferObject
{
    public string $password;
    public string $token;
}
