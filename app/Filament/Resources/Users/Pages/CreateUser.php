<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['password'] !== $data['password_confirmation']) {
            Notification::make('As senhas não coincidem.')
                ->danger()
                ->title('Erro ao criar usuário')
                ->send();

            $this->halt();
        }

        return $data;
    }
}
