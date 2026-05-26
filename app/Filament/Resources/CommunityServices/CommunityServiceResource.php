<?php

namespace App\Filament\Resources\CommunityServices;

use App\Filament\Resources\CommunityServices\Pages\CreateCommunityService;
use App\Filament\Resources\CommunityServices\Pages\EditCommunityService;
use App\Filament\Resources\CommunityServices\Pages\ListCommunityServices;
use App\Filament\Resources\CommunityServices\Schemas\CommunityServiceForm;
use App\Filament\Resources\CommunityServices\Tables\CommunityServicesTable;
use App\Models\CommunityService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CommunityServiceResource extends Resource
{
    protected static ?string $model = CommunityService::class;

    protected static ?string $navigationLabel = 'Pengabdian Masyarakat (Abdimas)';

    protected static ?string $modelLabel = 'Pengabdian Masyarakat';

    protected static ?string $pluralModelLabel = 'Pengabdian Masyarakat (Abdimas)';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CommunityServiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CommunityServicesTable::configure($table);
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
            'index' => ListCommunityServices::route('/'),
            'create' => CreateCommunityService::route('/create'),
            'edit' => EditCommunityService::route('/{record}/edit'),
        ];
    }
}
