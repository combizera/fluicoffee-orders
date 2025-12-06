<?php

namespace App\Filament\Pages;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Relaticle\Flowforge\Board;
use Relaticle\Flowforge\BoardPage;
use Relaticle\Flowforge\Column;

class StatusBoard extends BoardPage
{
    protected static string|null|\BackedEnum $navigationIcon = 'heroicon-s-view-columns';

    protected static ?string $navigationLabel = 'Quadro de Pedidos';

    protected static ?string $title = 'Gerencimento de Pedidos';

    protected static string | \UnitEnum | null $navigationGroup = 'Vendas';

    public function board(Board $board): Board
    {
        return $board
            ->query($this->getEloquentQuery())
            //TODO: colocar um subtitle
            ->recordTitleAttribute('customer.user.name')
            ->columnIdentifier('status')
            ->positionIdentifier('position')
            ->columns([
                Column::make(OrderStatus::PENDING->value)
                    ->label(OrderStatus::PENDING->label())
                    ->color('warning'),

                Column::make(OrderStatus::PROCESSING->value)
                    ->label(OrderStatus::PROCESSING->label())
                    ->color('gray'),

                Column::make(OrderStatus::READY->value)
                    ->label(OrderStatus::READY->label())
                    ->color('green'),

                Column::make(OrderStatus::ON_THE_WAY->value)
                    ->label(OrderStatus::ON_THE_WAY->label())
                    ->color('blue'),
            ]);
    }

    public function getEloquentQuery(): Builder
    {
        return Order::query();
    }
}
