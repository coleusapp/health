<?php

namespace App\Filament\Resources\OralCareResource\Pages;

use App\Filament\Resources\OralCareResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOralCareLogs extends ListRecords
{
    protected static string $resource = OralCareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
