<?php

namespace App\Filament\Resources\WeightResource\Pages;

use App\Filament\Resources\WeightResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWeights extends ListRecords
{
    protected static string $resource = WeightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
