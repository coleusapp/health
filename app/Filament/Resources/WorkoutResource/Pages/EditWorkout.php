<?php

namespace App\Filament\Resources\WorkoutResource\Pages;

use App\Filament\Resources\WorkoutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkout extends EditRecord
{
    protected static string $resource = WorkoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
