<?php

namespace App\Filament\Resources\OralCareResource\Pages;

use App\Filament\Resources\OralCareResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOralCareLog extends EditRecord
{
    protected static string $resource = OralCareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
