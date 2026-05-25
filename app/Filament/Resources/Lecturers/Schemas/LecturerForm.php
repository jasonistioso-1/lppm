<?php

namespace App\Filament\Resources\Lecturers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class LecturerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('nidn'),
                Select::make('department')
                    ->options([
                        'Akuntansi' => 'Akuntansi',
                        'Manajemen' => 'Manajemen',
                        'Ilmu Komunikasi' => 'Ilmu Komunikasi',
                        'Ilmu Administrasi Bisnis' => 'Ilmu Administrasi Bisnis',
                        'Sistem Informasi' => 'Sistem Informasi',
                        'Teknik Informatika' => 'Teknik Informatika',
                    ])
                    ->required(),
                TextInput::make('expertise'),
                FileUpload::make('photo')
                    ->image()
                    ->directory('dosen'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('google_scholar')
                    ->label('Google Scholar ID'),
                TextInput::make('sinta')
                    ->label('SINTA ID'),
                TextInput::make('scopus')
                    ->label('Scopus ID'),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->required()
                    ->default('active'),
            ]);
    }
}
