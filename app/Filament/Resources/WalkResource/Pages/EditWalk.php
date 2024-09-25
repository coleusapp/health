<?php

namespace App\Filament\Resources\WalkResource\Pages;

use App\Filament\Resources\WalkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWalk extends EditRecord
{
    protected static string $resource = WalkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
