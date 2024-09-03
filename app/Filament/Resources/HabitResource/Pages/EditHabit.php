<?php

namespace App\Filament\Resources\HabitResource\Pages;

use App\Filament\Resources\HabitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHabit extends EditRecord
{
    protected static string $resource = HabitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
