<?php

namespace App\Enums;

enum UserRank: int
{
    case NORMAL = 1;
    case SPECIAL = 2;
    case PREMIUM = 3;

    public function label(): string
    {
        return match ($this) {
            self::NORMAL => '通常会員',
            self::SPECIAL => '特別会員',
            self::PREMIUM => 'プレミアム会員',
            default => null,
        };
    }
}
