<?php

namespace App\Filament\Resources\CommunityServices\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CommunityServiceForm
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
                TextInput::make('scheme')
                    ->required(),
                TextInput::make('lecturer_name')
                    ->required(),
                TextInput::make('year')
                    ->required()
                    ->numeric(),
                RichEditor::make('abstract')
                    ->columnSpanFull(),
                FileUpload::make('document')
                    ->directory('pengabdian'),
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
