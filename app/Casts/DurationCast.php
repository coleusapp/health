<?php

namespace App\Casts;

use App\Concerns\DurationConcern;
use App\Concerns\WeightConcern;
use App\Settings\GeneralSettings;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class DurationCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->duration_unit ?? app(GeneralSettings::class)->duration_unit) {
            'second' => $value,
            'minute' => round(app(DurationConcern::class)->secondToMinute($value), 2),
            'hour' => round(app(DurationConcern::class)->secondToHour($value), 2),
            default => 0,
        } : null;
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->duration_unit ?? app(GeneralSettings::class)->duration_unit) {
            'second' => $value,
            'minute' => app(DurationConcern::class)->minuteToSecond($value),
            'hour' => app(DurationConcern::class)->hourToSecond($value),
            default => 0,
        } : null;
    }
}
