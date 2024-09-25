<?php

namespace App\Filament\Resources\WalkResource\Pages;

use App\Filament\Resources\WalkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWalks extends ListRecords
{
    protected static string $resource = WalkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
