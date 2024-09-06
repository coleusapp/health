<?php

namespace App\Filament\Resources\BrushingTeethLogResource\Pages;

use App\Filament\Resources\BrushingTeethLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrushingTeethLog extends EditRecord
{
    protected static string $resource = BrushingTeethLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
