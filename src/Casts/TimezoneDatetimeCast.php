<?php

namespace Coleus\Health\Casts;

use Carbon\Carbon;
use Coleus\Health\Settings\GeneralSettings;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class TimezoneDatetimeCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return Carbon::parse($value)->setTimezone(app(GeneralSettings::class)->timezone);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return Carbon::parse($value, app(GeneralSettings::class)->timezone)->setTimezone(config('app.timezone'));
    }
}
