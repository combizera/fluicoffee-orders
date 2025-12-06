<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações Pessoais')
                    ->icon('heroicon-s-user')
                    ->columnSpan(2)
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->placeholder('Nome do Usuário')
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->required()
                            ->placeholder('email@gmail.com')
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                    ]),

                Section::make('Segurança')
                    ->icon('heroicon-s-lock-closed')
                    ->columnSpan(2)
                    ->columns(2)
                    ->schema([
                        TextInput::make('password')
                            ->label('Senha')
                            ->password()
                            ->required(fn($context) => $context === 'create')
                            ->dehydrated(fn($state) => filled($state))
                            ->placeholder('********')
                            ->revealable()
                            ->minLength(8),

                        TextInput::make('password_confirmation')
                            ->label('Repita a Senha')
                            ->password()
                            ->required()
                            ->placeholder('********')
                            ->revealable()
                            ->minLength(8),
                    ]),
            ]);
    }
}
