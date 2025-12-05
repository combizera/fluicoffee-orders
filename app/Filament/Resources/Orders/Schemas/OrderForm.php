<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\Grind;
use App\Enums\OrderStatus;
use App\Enums\RoastPoint;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Cliente')
                    ->icon('heroicon-s-user')
                    ->columnSpan(2)
                    ->schema([
                        Select::make('customer_id')
                            ->label('Cliente')
                            ->relationship('customer', 'user.name')
                            ->getOptionLabelFromRecordUsing(fn($record) => $record->user->name)
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])
                    ->columns(1),

                Section::make('Detalhes do Pedido')
                    ->icon('heroicon-s-shopping-cart')
                    ->columnSpan(2)
                    ->schema([
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

                        Select::make('status')
                            ->label('Status')
                            ->options(collect(OrderStatus::cases())->mapWithKeys(
                                fn($case) => [$case->value => $case->label()]
                            ))
                            ->default(OrderStatus::PENDING->value)
                            ->required()
                            ->native(false),

                        Section::make('Observações')
                            ->icon('heroicon-s-document-text')
                            ->columnSpan(3)
                            ->schema([
                                Textarea::make('notes')
                                    ->label('Observações')
                                    ->nullable()
                                    ->placeholder('Comentários extras sobre o pedido...')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columns(3),

                Section::make('Embalagens')
                    ->icon('heroicon-s-cube')
                    ->columnSpan(2)
                    ->schema([
                        Repeater::make('packings')
                            ->label('Embalagens')
                            ->schema([
                                Select::make('packing_id')
                                    ->label('Embalagem')
                                    ->options(\App\Models\Packing::pluck('name', 'id'))
                                    ->required()
                                    ->preload()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems(),

                                TextInput::make('quantity')
                                    ->label('Quantidade')
                                    ->numeric()
                                    ->default(1)
                                    ->minValue(1)
                                    ->required(),
                            ])
                            ->columns(2)
                            ->defaultItems(1)
                            ->addActionLabel('Adicionar Embalagem')
                            ->collapsible()
                            ->itemLabel(fn(array $state): ?string =>
                            isset($state['packing_id'])
                                ? 'Embalagem: ' . \App\Models\Packing::find($state['packing_id'])?->name
                                : null
                            ),
                    ]),
            ]);
    }
}
