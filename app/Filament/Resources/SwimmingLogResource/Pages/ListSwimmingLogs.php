<?php

namespace App\Filament\Resources\SwimmingLogResource\Pages;

use App\Filament\Resources\SwimmingLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSwimmingLogs extends ListRecords
{
    protected static string $resource = SwimmingLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
