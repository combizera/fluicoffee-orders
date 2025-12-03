<?php

namespace App\Enums;

enum RoastPoint: string
{
    case LIGHT = 'light';
    case MEDIUM_LIGHT = 'medium_light';
    case MEDIUM = 'medium';
    case MEDIUM_DARK = 'medium_dark';
    case DARK = 'dark';

    public function label(): string
    {
        return match($this) {
            self::LIGHT => 'Claro',
            self::MEDIUM_LIGHT => 'Médio Claro',
            self::MEDIUM => 'Médio',
            self::MEDIUM_DARK => 'Médio Escuro',
            self::DARK => 'Escuro',
        };
    }
}
