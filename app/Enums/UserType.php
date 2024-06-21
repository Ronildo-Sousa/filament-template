<?php

namespace App\Enums;

enum UserType: string
{
    case DEFAULT = 'default';
    case ADMIN = 'admin';
    case MANAGER = 'manager';

    public static function adminOrManager(): array
    {
        return [
            self::ADMIN->value,
            self::MANAGER->value,
        ];
    }
    
    public static function options(): array
    {
        return [
            self::ADMIN->value=> 'ADMINISTRADOR',
            self::DEFAULT->value => 'PADRÃO',
        ];
    }
}