<?php

namespace App\Filament\Resources\Packings\Pages;

use App\Filament\Resources\Packings\PackingResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPacking extends ViewRecord
{
    protected static string $resource = PackingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
