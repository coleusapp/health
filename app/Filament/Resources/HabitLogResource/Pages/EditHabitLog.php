<?php

namespace App\Filament\Resources\HabitLogResource\Pages;

use App\Filament\Resources\HabitLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHabitLog extends EditRecord
{
    protected static string $resource = HabitLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
