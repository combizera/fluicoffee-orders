<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
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

                TextColumn::make('customer.user.name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('packing.name')
                    ->label('Embalagem')
                    ->sortable(),

                TextColumn::make('roast_point')
                    ->label('Ponto de Torra')
                    ->alignCenter()
                    ->badge(),

                TextColumn::make('grind')
                    ->label('Moagem')
                    ->alignCenter()
                    ->badge(),

                TextColumn::make('status')
                    ->label('Status')
                    ->alignCenter()
                    ->badge(),

                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('')
                    ->tooltip('Ver Pedido'),
                ActionGroup::make([
                    EditAction::make()
                        ->label('Editar Pedido'),

                    DeleteAction::make()
                        ->label('Excluir Pedido'),
                ]),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
