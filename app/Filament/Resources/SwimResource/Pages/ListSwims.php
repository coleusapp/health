<?php

namespace App\Filament\Resources\SwimResource\Pages;

use App\Filament\Resources\SwimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSwims extends ListRecords
{
    protected static string $resource = SwimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
