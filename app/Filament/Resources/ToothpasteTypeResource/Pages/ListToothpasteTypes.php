<?php

namespace App\Filament\Resources\ToothpasteTypeResource\Pages;

use App\Filament\Resources\ToothpasteTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListToothpasteTypes extends ListRecords
{
    protected static string $resource = ToothpasteTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
