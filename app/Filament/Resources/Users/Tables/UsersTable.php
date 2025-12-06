<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('customer')
                    ->label('Cliente')
                    ->boolean()
                    ->getStateUsing(fn($record) => $record->hasRole('admin'))
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->tooltip(fn($record) => $record->hasRole('admin') ? 'Admin' : 'Cliente')
                    ->alignCenter(),

                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email_verified_at')
                    ->label('E-mail Verificado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('customer.phone')
                    ->label('Telefone')
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_customer')
                    ->label('É Cliente')
                    ->queries(
                        true: fn($query) => $query->whereHas('customer'),
                        false: fn($query) => $query->whereDoesntHave('customer'),
                    ),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Editar'),

                ActionGroup::make([
                    self::handleAdmin(),
                    DeleteAction::make()
                        ->label('Excluir')
                        ->requiresConfirmation(),
                ]),
            ])
            ->toolbarActions([
                //
            ]);
    }

    protected static function handleAdmin(): Action
    {
        return Action::make('admin')
            ->label(fn (Model $record) => $record->hasRole('admin') ? 'Remover Admin' : 'Tornar Admin')
            ->color(fn (Model $record) => $record->hasRole('admin') ? 'danger' : 'success')
            ->requiresConfirmation()
            ->icon('heroicon-s-user')
            ->action(function (Model $record) {
                if ($record->hasRole('admin')) {
                    $record->removeRole('admin');
                } else {
                    $record->assignRole('admin');
                }
                $record->save();
            })
            ->after(function (Model $record) {
                if ($record->hasRole('admin')) {
                    Notification::make()
                        ->success()
                        ->duration(5000)
                        ->title("$record->name é admin")
                        ->body("$record->name agora se tornou um admin")
                        ->send();
                } else {
                    Notification::make()
                        ->danger()
                        ->duration(5000)
                        ->title("$record->name não é admin")
                        ->body("$record->name não é mais admin")
                        ->send();
                }
            });
    }
}
