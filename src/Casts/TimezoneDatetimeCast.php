<?php

namespace Coleus\Health\Casts;

// use App\Settings\GeneralSettings;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class TimezoneDatetimeCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return Carbon::parse($value)->setTimezone(config('app.timezone'));
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return Carbon::parse($value, config('app.timezone'))->setTimezone('UTC');
    }
}
