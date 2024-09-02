<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use DateTimeZone;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Illuminate\Support\Arr;

class ManageGeneral extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $activeNavigationIcon = 'heroicon-s-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('timezone')
                    ->options(fn () => Arr::map(DateTimeZone::listIdentifiers(), fn ($item) => $item))
                    ->label('Timezone')
                    ->required()
                    ->searchable(),
                Select::make('weight_unit')
                    ->options(['lbs' => 'Pound (lbs)', 'kg' => 'Kilogram (kg)'])
                    ->required(),
            ]);
    }
}
