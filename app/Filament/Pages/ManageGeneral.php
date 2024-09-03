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
    protected static ?string $navigationIcon = null;

    protected static ?string $navigationGroup = 'Settings';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $title = 'General';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('timezone')
                    ->options(fn () => array_combine(DateTimeZone::listIdentifiers(), DateTimeZone::listIdentifiers()))
                    ->label('Timezone')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('weight_unit')
                    ->options(['lbs' => 'Pound (lbs)', 'kg' => 'Kilogram (kg)'])
                    ->required(),
                Select::make('distance_unit')
                    ->options(['kilometer' => 'Kilometer', 'mile' => 'Mile'])
                    ->required(),
            ]);
    }
}
