<?php

namespace App\Filament\Resources\Packings;

use App\Filament\Resources\Packings\Pages\CreatePacking;
use App\Filament\Resources\Packings\Pages\EditPacking;
use App\Filament\Resources\Packings\Pages\ListPackings;
use App\Filament\Resources\Packings\Pages\ViewPacking;
use App\Filament\Resources\Packings\Schemas\PackingForm;
use App\Filament\Resources\Packings\Schemas\PackingInfolist;
use App\Filament\Resources\Packings\Tables\PackingsTable;
use App\Models\Packing;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class PackingResource extends Resource
{
    protected static ?string $model = Packing::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cube;

    protected static ?string $modelLabel = 'Pacote';

    protected static ?string $pluralLabel = 'Pacotes';

    protected static ?string $slug = 'pacotes';

    protected static ?string $recordTitleAttribute = 'name';

    protected static string | \UnitEnum | null $navigationGroup = 'Configurações';

    protected static ?int $navigationSort = 10;

    public static function canAccess(): bool
    {
        return Auth::user()->hasRole('admin');
    }

    public static function form(Schema $schema): Schema
    {
        return PackingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PackingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PackingsTable::configure($table);
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
            'index' => ListPackings::route('/'),
            'create' => CreatePacking::route('/create'),
            'view' => ViewPacking::route('/{record}'),
            'edit' => EditPacking::route('/{record}/edit'),
        ];
    }
}
