<?php

namespace Src\Users\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ForgotPasswordDto extends DataTransferObject
{
    public string $email;
}
