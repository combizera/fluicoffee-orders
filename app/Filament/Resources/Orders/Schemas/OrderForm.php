<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\Grind;
use App\Enums\OrderStatus;
use App\Enums\RoastPoint;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\IconPosition;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detalhes do Pedido')
                    ->icon('heroicon-s-shopping-cart')
                    ->columnSpan(2)
                    ->schema([
                        Select::make('packing_id')
                            ->label('Embalagem')
                            ->relationship('packing', 'name')
                            ->required()
                            ->preload(),

                        Select::make('roast_point')
                            ->label('Ponto de Torra')
                            ->options(collect(RoastPoint::cases())->mapWithKeys(
                                fn($case) => [$case->value => $case->label()]
                            ))
                            ->required()
                            ->native(false),

                        Select::make('grind')
                            ->label('Moagem')
                            ->options(collect(Grind::cases())->mapWithKeys(
                                fn($case) => [$case->value => $case->label()]
                            ))
                            ->required()
                            ->native(false),
                    ])
                    ->columns(3),

                Section::make('Status e Observações')
                    ->icon('heroicon-s-table-cells')
                    ->columnSpan(2)
                    ->columns(2)
                    ->schema([
                        Select::make('customer_id')
                            ->label('Cliente')
                            ->relationship('customer', 'user.name')
                            ->getOptionLabelFromRecordUsing(fn($record) => $record->user->name)
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('status')
                            ->label('Status')
                            ->options(collect(OrderStatus::cases())->mapWithKeys(
                                fn($case) => [$case->value => $case->label()]
                            ))
                            ->default(OrderStatus::PENDING->value)
                            ->required()
                            ->native(false),

                        Textarea::make('notes')
                            ->label('Observações')
                            ->nullable()
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
