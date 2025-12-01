<?php

namespace Coleus\Health\Settings;

use Coleus\Health\Enums\CalorieEnum;
use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $timezone = 'UTC';

    public string $weight_unit = WeightEnum::LBS->value;

    public string $distance_unit = DistanceEnum::Mile->value;

    public string $duration_unit = DurationEnum::Minute->value;

    public string $calorie_unit = CalorieEnum::KCAL->value;

    public static function group(): string
    {
        return config('health.settings_prefix').'_general';
    }
}
