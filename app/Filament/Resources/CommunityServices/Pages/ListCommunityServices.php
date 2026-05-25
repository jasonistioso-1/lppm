<?php

namespace App\Filament\Resources\CommunityServices\Pages;

use App\Filament\Resources\CommunityServices\CommunityServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCommunityServices extends ListRecords
{
    protected static string $resource = CommunityServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
