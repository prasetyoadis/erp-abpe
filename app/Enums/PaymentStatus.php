<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case UNPAID = 'unpaid';
    case PARTIAL = 'partial';
    case PAID = 'paid';

    public function label(): string
    {
        return match ($this) {
            self::UNPAID => 'Belum Lunas',
            self::PARTIAL => 'Sebagian',
            self::PAID => 'Lunas',
        };
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::UNPAID => 'badge-outline--neutral',
            self::PARTIAL => 'badge-outline--progress',
            self::PAID => 'badge-outline--success',
        };
    }
}