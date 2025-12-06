<?php

namespace App\Filament\Customer\Resources\Orders\Schemas;

use App\Enums\Grind;
use App\Enums\OrderStatus;
use App\Enums\RoastPoint;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações do Pedido')
                    ->icon('heroicon-s-shopping-cart')
                    ->columns(3)
                    ->columnSpan(2)
                    ->schema([
                        TextEntry::make('uuid')
                            ->label('Código do Pedido')
                            ->copyable(),

                        TextEntry::make('status')
                            ->label('Status')
                            ->formatStateUsing(fn (OrderStatus $state) => $state->label())
                            ->badge()
                            ->color(fn (OrderStatus $state) => $state->color()),

                        TextEntry::make('created_at')
                            ->label('Criado em')
                            ->dateTime('d/m/Y H:i'),
                    ]),

                Section::make('Especificações')
                    ->icon('heroicon-s-fire')
                    ->columns(3)
                    ->columnSpan(2)
                    ->schema([
                        TextEntry::make('total_weight')
                            ->label('Peso Total')
                            ->state(fn ($record) => number_format($record->total_weight, 0, ',', ',').' gramas')
                            ->weight('bold'),

                        TextEntry::make('roast_point')
                            ->label('Ponto de Torra')
                            ->formatStateUsing(fn (RoastPoint $state) => $state->label())
                            ->badge(),

                        TextEntry::make('grind')
                            ->label('Moagem')
                            ->formatStateUsing(fn (Grind $state) => $state->label())
                            ->badge(),
                    ]),

                Section::make('Observações')
                    ->icon('heroicon-s-document-text')
                    ->visible(fn ($record) => filled($record->notes))
                    ->schema([
                        TextEntry::make('notes')
                            ->label('')
                            ->placeholder('Nenhuma observação')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
