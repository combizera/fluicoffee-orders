<?php

namespace App\Filament\Customer\Resources\Orders\Tables;

use App\Enums\Grind;
use App\Enums\OrderStatus;
use App\Enums\RoastPoint;
use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('uuid')
                    ->label('Id do Pedido')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->copyable(),

                TextColumn::make('total_weight')
                    ->label('Peso Total')
                    ->getStateUsing(fn ($record) => $record->total_weight)
                    ->numeric()
                    ->alignCenter()
                    ->suffix(' g')
                    ->sortable(query: function ($query, $direction) {
                        return $query->withSum('packings as total_weight', \DB::raw('weight * order_packings.quantity'))
                            ->orderBy('total_weight', $direction);
                    }),

                TextColumn::make('roast_point')
                    ->label('Ponto de Torra')
                    ->formatStateUsing(fn (RoastPoint $state) => $state->label())
                    ->alignCenter()
                    ->badge(),

                TextColumn::make('grind')
                    ->label('Moagem')
                    ->formatStateUsing(fn (Grind $state) => $state->label())
                    ->alignCenter()
                    ->badge(),

                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn (OrderStatus $state) => $state->label())
                    ->alignCenter()
                    ->color(fn (OrderStatus $state) => $state->color())
                    ->badge(),

                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options(collect(OrderStatus::cases())->mapWithKeys(
                        fn ($case) => [$case->value => $case->label()]
                    ))
                    ->multiple(),

                SelectFilter::make('roast_point')
                    ->label('Ponto de Torra')
                    ->options(collect(RoastPoint::cases())->mapWithKeys(
                        fn ($case) => [$case->value => $case->label()]
                    ))
                    ->multiple(),

                SelectFilter::make('grind')
                    ->label('Moagem')
                    ->options(collect(Grind::cases())->mapWithKeys(
                        fn ($case) => [$case->value => $case->label()]
                    ))
                    ->multiple(),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('')
                    ->tooltip('Ver Pedido'),

                ActionGroup::make([
                    // TODO: adcionar validação para que ele só possa editar pedidos com status PENDING
                    EditAction::make()
                        ->label('Editar Pedido'),
                ]),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
