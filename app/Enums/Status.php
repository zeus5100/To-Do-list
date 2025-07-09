<?php

namespace App\Enums;

enum Status: string
{
    case TODO = 'to-do';
    case IN_PROGRESS = 'in progress';
    case DONE = 'done';

    public static function values(): array
    {
        return array_map(fn ($case) => $case->value, self::cases());
    }
}
