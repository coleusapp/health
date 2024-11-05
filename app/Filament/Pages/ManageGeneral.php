<?php

namespace App\Filament\Pages;

use App\Enums\DistanceEnum;
use App\Enums\DurationEnum;
use App\Enums\WeightEnum;
use App\Settings\GeneralSettings;
use DateTimeZone;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGeneral extends SettingsPage
{
    protected static string $settings = GeneralSettings::class;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $title = 'General';

    protected static ?string $navigationIcon = 'healthicons-o-ui-settings';

    protected static ?int $navigationSort = 99;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('timezone')
                    ->options(fn() => array_combine(DateTimeZone::listIdentifiers(), DateTimeZone::listIdentifiers()))
                    ->label('Timezone')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('weight_unit')
                    ->options(WeightEnum::class)
                    ->required(),
                Select::make('distance_unit')
                    ->options(DistanceEnum::class)
                    ->required(),
                Select::make('duration_unit')
                    ->options(DurationEnum::class)
                    ->required(),
            ]);
    }
}
