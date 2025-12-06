<?php

namespace App\Enums;

enum Grind: string
{
    case WHOLE_BEAN = 'whole_bean';
    case COARSE = 'coarse';
    case MEDIUM = 'medium';
    case FINE = 'fine';
    case EXTRA_FINE = 'extra_fine';

    public function label(): string
    {
        return match ($this) {
            self::WHOLE_BEAN => 'Grão Inteiro',
            self::COARSE => 'Grossa',
            self::MEDIUM => 'Média',
            self::FINE => 'Fina',
            self::EXTRA_FINE => 'Extra Fina',
        };
    }
}
