<?php

namespace App\Filament\Pages;

use App\Enums\OrderStatus;
use App\Enums\RoastPoint;
use App\Models\Order;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
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
            ->query($this->getEloquentQuery()->with('customer.user'))
            ->recordTitleAttribute('customer.user.name')
            ->columnIdentifier('status')
            ->positionIdentifier('position')
            ->cardAction('edit')
            //TODO:mostrar pro gui se ele quer isso
            ->cardActions([
                EditAction::make()->model(Order::class),
            ])
            ->cardSchema(fn (Schema $schema) => $schema->components([
                TextEntry::make('total_weight')
                    ->label('Peso')
                    ->badge()
                    ->suffix(' g')
                    ->icon('heroicon-s-scale'),

                TextEntry::make('roast_point')
                    ->label('Ponto')
                    ->formatStateUsing(fn(RoastPoint $state) => $state->label())
                    ->badge('info')
                    ->icon('heroicon-s-fire'),

            ]))
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
