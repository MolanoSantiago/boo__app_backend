<?php

namespace Hex\Shared\Domain\Constants;

enum UserTypeEnum: string
{
    case SUPER = 'Superadministrador';
    case ADMIN = 'Administrador';
    case CUSTOMER = 'Cliente';

    public static function id(UserTypeEnum $userType): int
    {
        return match ($userType) {
            self::SUPER => 1,
            self::ADMIN => 2,
            self::CUSTOMER => 3
        };
    }

    public static function description(UserTypeEnum $userType): string
    {
        return match ($userType) {
            self::SUPER => 'El superadministrador tiene acceso total a cualquier funcionalidad de la plataforma.',
            self::ADMIN => 'El administrador tiene acceso a la gestión en su establecimiento de la plataforma.',
            self::CUSTOMER => 'El cliente tiene acceso a reservar en cualquier establecimiento de la plataforma.'
        };
    }

    public static function slug(UserTypeEnum $userType): string
    {
        return match ($userType) {
            self::SUPER => 'super',
            self::ADMIN => 'admin',
            self::CUSTOMER => 'customer'
        };
    }
}
