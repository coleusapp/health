<?php

namespace Coleus\Health\Casts;

use Coleus\Health\Facades\Settings;
use DateTimeInterface;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TimezoneCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): ?Carbon
    {
        if (!$value) {
            return null;
        }

        return Carbon::parse($value, 'UTC')->setTimezone(Settings::get('general.timezone', 'UTC'));
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        if (!$value) {
            return null;
        }

        $date = $value instanceof DateTimeInterface
            ? Carbon::instance($value)
            : Carbon::parse($value, Settings::get('general.timezone', 'UTC'));

        return $date->clone()->setTimezone('UTC')->format('Y-m-d H:i:s');
    }
}
