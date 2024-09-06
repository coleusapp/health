<?php

namespace App\Filament\Resources\BrushingTeethLogResource\Pages;

use App\Filament\Resources\BrushingTeethLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrushingTeethLogs extends ListRecords
{
    protected static string $resource = BrushingTeethLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
