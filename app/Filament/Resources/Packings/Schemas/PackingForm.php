<?php

namespace App\Filament\Resources\Packings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PackingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações da Embalagem')
                    ->icon('heroicon-s-cube')
                    ->columnSpan(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ex: Pacote - 250g'),

                        TextInput::make('weight')
                            ->label('Peso (gramas)')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->suffix('gramas')
                            ->placeholder('250'),
                    ])
                    ->columns(2),
            ]);
    }
}
