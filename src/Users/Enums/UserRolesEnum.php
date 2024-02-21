<?php

namespace Src\Users\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self USER()
 * @method static self ADMIN()
 * @method static self EMPLOYER()
 */

class UserRolesEnum extends Enum
{
    /**
     * @return array{USER: string, ADMIN: string, EMPLOYER: string}
     */
    protected static function labels(): array
    {
        return [
            "USER" => "Пользователь",
            "ADMIN" => "Админ",
            "EMPLOYER" => "Сотрудник",
        ];
   }
}
