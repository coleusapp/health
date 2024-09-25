<?php

namespace App\Filament\Resources\ToothpasteTypeResource\Pages;

use App\Filament\Resources\ToothpasteTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditToothpasteType extends EditRecord
{
    protected static string $resource = ToothpasteTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
