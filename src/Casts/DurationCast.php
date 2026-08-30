<?php

namespace Coleus\Health\Casts;

use Coleus\Health\Contracts\Duration;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class DurationCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->duration_unit) { //  ?? app(GeneralSettings::class)->duration_unit
            'second' => $value,
            'minute' => round(Duration::class->secondToMinute($value), 2),
            'hour' => round(Duration::class->secondToHour($value), 2),
            default => 0,
        } : null;
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->duration_unit) {
            'second' => $value,
            'minute' => Duration::class->minuteToSecond($value),
            'hour' => Duration::class->hourToSecond($value),
            default => 0,
        } : null;
    }
}
