<?php

namespace App\Filament\Resources\SwimmingTypeResource\Pages;

use App\Filament\Resources\SwimmingTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSwimmingType extends EditRecord
{
    protected static string $resource = SwimmingTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
