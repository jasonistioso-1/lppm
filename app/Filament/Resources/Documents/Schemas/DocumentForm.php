<?php

namespace App\Filament\Resources\Documents\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('category')
                    ->options([
                        'Panduan' => 'Panduan',
                        'Template' => 'Template',
                        'Unduhan' => 'Unduhan',
                    ])
                    ->required(),
                FileUpload::make('file')
                    ->directory('dokumen')
                    ->required(),
                RichEditor::make('description')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->required()
                    ->default('draft'),
            ]);
    }
}
