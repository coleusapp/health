<?php

namespace App\Filament\Resources\SetResource\Pages;

use App\Filament\Resources\SetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSets extends ListRecords
{
    protected static string $resource = SetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
