<?php

namespace App\Filament\Resources\SwimResource\Pages;

use App\Filament\Resources\SwimResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSwim extends EditRecord
{
    protected static string $resource = SwimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
