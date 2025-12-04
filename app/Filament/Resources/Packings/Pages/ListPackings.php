<?php

namespace App\Filament\Resources\Packings\Pages;

use App\Filament\Resources\Packings\PackingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPackings extends ListRecords
{
    protected static string $resource = PackingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
