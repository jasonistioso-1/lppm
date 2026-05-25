<?php

namespace App\Filament\Resources\Publications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PublicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('type')
                    ->options([
                        'Jurnal' => 'Jurnal',
                        'Artikel Ilmiah' => 'Artikel Ilmiah',
                        'Prosiding' => 'Prosiding',
                    ])
                    ->required(),
                TextInput::make('author')
                    ->required(),
                TextInput::make('journal_name'),
                TextInput::make('year')
                    ->required()
                    ->numeric(),
                TextInput::make('link')
                    ->url(),
                FileUpload::make('file')
                    ->directory('publikasi'),
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
