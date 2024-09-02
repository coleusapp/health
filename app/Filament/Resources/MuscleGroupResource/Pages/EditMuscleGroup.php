<?php

namespace App\Filament\Resources\MuscleGroupResource\Pages;

use App\Filament\Resources\MuscleGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMuscleGroup extends EditRecord
{
    protected static string $resource = MuscleGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
