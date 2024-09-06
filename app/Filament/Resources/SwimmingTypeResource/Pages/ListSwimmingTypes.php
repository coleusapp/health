<?php

namespace App\Filament\Resources\SwimmingTypeResource\Pages;

use App\Filament\Resources\SwimmingTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSwimmingTypes extends ListRecords
{
    protected static string $resource = SwimmingTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
