<?php

namespace App\Filament\Resources\Packings\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PackingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('weight')
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('weight')
                    ->label('Peso (gramas)')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('')
                    ->tooltip('Ver Embalagem'),

                ActionGroup::make([
                    EditAction::make()
                        ->label('Editar Embalagem'),

                    DeleteAction::make()
                        ->label('Excluir Embalagem'),
                ]),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
