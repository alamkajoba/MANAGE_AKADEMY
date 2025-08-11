<?php
declare(strict_types =1);
namespace App\Enums;

enum AcademicYearStatus :string
{
    case CURRENT = 'active';
    case INACTIVE = 'inactive';
    case PASSED = 'passée';
    public static function values(): array
    {
        return array_column(self::cases(), 'value'); 
    }
}
