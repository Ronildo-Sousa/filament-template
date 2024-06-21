<?php

namespace App\Enums;

enum UserType: string
{
    case DEFAULT = 'default';
    case ADMIN = 'admin';
    case MANAGER = 'manager';
}