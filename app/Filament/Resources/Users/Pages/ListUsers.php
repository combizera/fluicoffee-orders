<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()
                ->label('Todos'),

            'admin' => Tab::make()
                ->label('Administradores')
                ->modifyQueryUsing(fn (Builder $query) => $query->role('admin'))
                ->badge(fn() => \App\Models\User::role('admin')->count()),

            'customers' => Tab::make()
                ->label('Clientes')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('customer'))
                ->badge(fn() => \App\Models\User::whereHas('customer')->count()),
        ];
    }
}
