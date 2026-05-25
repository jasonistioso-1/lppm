<?php

namespace App\Filament\Resources\CommunityServices\Pages;

use App\Filament\Resources\CommunityServices\CommunityServiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCommunityService extends EditRecord
{
    protected static string $resource = CommunityServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
