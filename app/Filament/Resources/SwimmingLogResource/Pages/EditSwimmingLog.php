<?php

namespace App\Filament\Resources\SwimmingLogResource\Pages;

use App\Filament\Resources\SwimmingLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSwimmingLog extends EditRecord
{
    protected static string $resource = SwimmingLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
