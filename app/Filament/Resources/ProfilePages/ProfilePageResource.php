<?php

namespace App\Filament\Resources\ProfilePages;

use App\Filament\Resources\ProfilePages\Pages\CreateProfilePage;
use App\Filament\Resources\ProfilePages\Pages\EditProfilePage;
use App\Filament\Resources\ProfilePages\Pages\ListProfilePages;
use App\Filament\Resources\ProfilePages\Schemas\ProfilePageForm;
use App\Filament\Resources\ProfilePages\Tables\ProfilePagesTable;
use App\Models\ProfilePage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProfilePageResource extends Resource
{
    protected static ?string $model = ProfilePage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ProfilePageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilePagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProfilePages::route('/'),
            'create' => CreateProfilePage::route('/create'),
            'edit' => EditProfilePage::route('/{record}/edit'),
        ];
    }
}
