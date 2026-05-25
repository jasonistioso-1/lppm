<?php

namespace App\Filament\Resources\ProfilePages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ProfilePageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('page_key')
                    ->options([
                        'tentang-kami' => 'Tentang Kami',
                        'visi-misi' => 'Visi Misi',
                        'struktur-organisasi' => 'Struktur Organisasi',
                        'prestasi' => 'Prestasi',
                    ])
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('title')
                    ->required(),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('profil'),
            ]);
    }
}
