<?php

namespace Hex\Shared\Domain\Constants;

enum PaymentMethodEnum: string
{
    case ONLINE = 'En línea';
    case CASH = 'Efectivo';

    public static function id(PaymentMethodEnum $paymentMethod): int
    {
        return match ($paymentMethod) {
            self::ONLINE => 1,
            self::CASH => 2,
        };
    }

    public static function slug(PaymentMethodEnum $paymentMethod): string
    {
        return match ($paymentMethod) {
            self::ONLINE => 'online',
            self::CASH => 'cash',
        };
    }
}
