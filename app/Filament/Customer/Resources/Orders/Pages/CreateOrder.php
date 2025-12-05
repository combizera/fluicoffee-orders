<?php

namespace App\Filament\Customer\Resources\Orders\Pages;

use App\Enums\OrderStatus;
use App\Filament\Customer\Resources\Orders\OrderResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['uuid'] = Str::uuid()->toString();
        $data['customer_id'] = Auth::user()->id;
        $data['status'] = OrderStatus::PENDING->value;

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
