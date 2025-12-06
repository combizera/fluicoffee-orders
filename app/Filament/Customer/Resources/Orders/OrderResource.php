<?php

namespace App\Filament\Customer\Resources\Orders;

use App\Filament\Customer\Resources\Orders\Pages\CreateOrder;
use App\Filament\Customer\Resources\Orders\Pages\EditOrder;
use App\Filament\Customer\Resources\Orders\Pages\ListOrders;
use App\Filament\Customer\Resources\Orders\Pages\ViewOrder;
use App\Filament\Customer\Resources\Orders\Schemas\OrderForm;
use App\Filament\Customer\Resources\Orders\Schemas\OrderInfolist;
use App\Filament\Customer\Resources\Orders\Tables\OrdersTable;
use App\Models\Order;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentList;

    protected static ?string $recordTitleAttribute = 'uuid';

    protected static ?string $modelLabel = 'Pedido';

    protected static ?string $pluralLabel = 'Pedidos';

    protected static ?string $slug = 'pedidos';

    protected static string|\UnitEnum|null $navigationGroup = 'Seus Pedidos';

    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereCustomerId(Auth::user()->id);
    }

    public static function form(Schema $schema): Schema
    {
        return OrderForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OrderInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrdersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrders::route('/'),
            'create' => CreateOrder::route('/create'),
            'view' => ViewOrder::route('/{record}'),
            'edit' => EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
