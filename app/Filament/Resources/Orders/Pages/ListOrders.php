<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Enums\OrderStatus;
use App\Filament\Resources\Orders\OrderResource;
use App\Models\Order;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

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

            'pending' => Tab::make()
                ->label(OrderStatus::PENDING->label())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', OrderStatus::PENDING))
                ->badge(fn() => Order::where('status', OrderStatus::PENDING)->count())
                ->badgeColor('gray'),

            'processing' => Tab::make()
                ->label(OrderStatus::PROCESSING->label())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', OrderStatus::PROCESSING))
                ->badge(fn() => Order::where('status', OrderStatus::PROCESSING)->count())
                ->badgeColor('gray'),

            'completed' => Tab::make()
                ->label(OrderStatus::READY->label())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', OrderStatus::READY))
                ->badge(fn() => Order::where('status', OrderStatus::READY)->count())
                ->badgeColor('gray'),

            'on_the_way' => Tab::make()
                ->label(OrderStatus::ON_THE_WAY->label())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', OrderStatus::ON_THE_WAY))
                ->badge(fn() => Order::where('status', OrderStatus::ON_THE_WAY)->count())
                ->badgeColor('gray'),
        ];
    }
}
