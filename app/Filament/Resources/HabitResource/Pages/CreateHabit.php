<?php

namespace App\Filament\Resources\HabitResource\Pages;

use App\Filament\Resources\HabitResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHabit extends CreateRecord
{
    protected static string $resource = HabitResource::class;
}
