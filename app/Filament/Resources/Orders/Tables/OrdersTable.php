<?php

namespace App\Filament\Resources\Orders\Tables;

use App\Enums\Grind;
use App\Enums\OrderStatus;
use App\Enums\RoastPoint;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
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

                TextColumn::make('customer.user.name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),

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

                SelectFilter::make('customer')
                    ->label('Cliente')
                    ->relationship('customer.user', 'name')
                    ->searchable()
                    ->preload()
                    ->multiple(),
            ])
            ->recordActions([
                self::handleChangeStatus(),
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

    protected static function handleChangeStatus(): Action
    {
        return Action::make('change_status')
            ->label('Status')
            ->tooltip('Alterar Status do Pedido')
            ->icon('heroicon-o-arrow-path')
            ->schema([
                Select::make('status')
                    ->label('Novo Status')
                    ->options(collect(OrderStatus::cases())->mapWithKeys(
                        fn ($case) => [$case->value => $case->label()]
                    ))
                    ->required()
                    ->native(false)
                    ->default(fn ($record) => $record->status),
            ])
            ->action(function (array $data, $record) {
                $record->update([
                    'status' => $data['status'],
                ]);

                Notification::make()
                    ->title('Status atualizado com sucesso!')
                    ->success()
                    ->send();
            });
    }
}
