<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $timezone;

    public string $weight_unit;

    public string $distance_unit;

    public string $duration_unit;

    public static function group(): string
    {
        return 'general';
    }
}
