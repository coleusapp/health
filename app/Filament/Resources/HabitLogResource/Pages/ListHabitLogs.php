<?php

namespace App\Filament\Resources\HabitLogResource\Pages;

use App\Filament\Resources\HabitLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHabitLogs extends ListRecords
{
    protected static string $resource = HabitLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
