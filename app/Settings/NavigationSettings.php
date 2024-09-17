<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class NavigationSettings extends Settings
{
    public bool $weight;

    public bool $workout;

    public bool $oral_care;

    public bool $swim;

    public static function group(): string
    {
        return 'navigation';
    }
}