<?php

namespace App\Filament\Pages;

use App\Settings\NavigationSettings;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageNavigation extends SettingsPage
{
    protected static string $settings = NavigationSettings::class;

    protected static ?string $title = 'Navigation';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'healthicons-o-ui-settings';

    protected static ?int $navigationSort = 99;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('weight'),
                Forms\Components\Toggle::make('workout'),
                Forms\Components\Toggle::make('oral_care'),
            ]);
    }
}
