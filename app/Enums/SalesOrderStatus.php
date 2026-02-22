<?php

namespace App\Enums;

enum SalesOrderStatus: string
{
    case DRAFT = 'draft';
    case SHIPPED = 'shipped';
    case CONFIRMED = 'confirmed';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::SHIPPED => 'Dikirim',
            self::CONFIRMED => 'Disetujui',
            self::COMPLETED => 'Selesai',
            self::CANCELLED => 'Dibatalkan',
        };
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::DRAFT => 'badge--neutral',
            self::SHIPPED => 'badge--progress',
            self::CONFIRMED => 'badge--confirmed',
            self::COMPLETED => 'badge--success',
            self::CANCELLED => 'badge--danger',
        };
    }
}