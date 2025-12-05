<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['uuid'] = Str::uuid()->toString();

        return $data;
    }

    protected function afterCreate(): void
    {
        $packings = $this->data['packings'] ?? [];

        foreach ($packings as $packing) {
            $this->record->packings()->attach($packing['packing_id'], [
                'quantity' => $packing['quantity']
            ]);
        }
    }
}
