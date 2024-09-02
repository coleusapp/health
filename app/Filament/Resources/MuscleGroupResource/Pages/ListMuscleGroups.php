<?php

namespace App\Filament\Resources\MuscleGroupResource\Pages;

use App\Filament\Resources\MuscleGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMuscleGroups extends ListRecords
{
    protected static string $resource = MuscleGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
