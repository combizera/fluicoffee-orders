<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case READY = 'ready';
    case ON_THE_WAY = 'on_the_way';

    public function label(): string
    {
        return match($this) {
            self::PENDING => 'Aguardando',
            self::PROCESSING => 'Em Processo',
            self::READY => 'Pronto para Retirada',
            self::ON_THE_WAY => 'A Caminho',
        };
    }
}
