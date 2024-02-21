<?php

namespace Src\Users\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class LoginDto extends DataTransferObject
{
    public string $email;
    public string $password;
}
