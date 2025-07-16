<?php
declare(strict_types=1);

namespace App\Enums;

enum GenderEnum :string
{
    case MALE = 'M';
    case FEMALE = 'F';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}