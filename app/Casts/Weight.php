<?php

namespace App\Casts;

use App\Concerns\WeightConcern;
use App\Settings\GeneralSettings;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class Weight implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->weight_unit ?? app(GeneralSettings::class)->weight_unit) {
            'kg' => round(app(WeightConcern::class)->gToKg($value), 2),
            'lbs' => round(app(WeightConcern::class)->gToLbs($value), 2),
            default => 0,
        } : null;
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->weight_unit ?? app(GeneralSettings::class)->weight_unit) {
            'kg' => app(WeightConcern::class)->kgToG($value),
            'lbs' => app(WeightConcern::class)->lbsToG($value),
            default => 0,
        } : null;
    }
}
