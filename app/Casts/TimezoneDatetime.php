<?php

namespace App\Casts;

use App\Settings\GeneralSettings;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class TimezoneDatetime implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return Carbon::parse($value)->tz(app(GeneralSettings::class)->timezone);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return Carbon::parse($value)->tz('UTC');
    }
}
