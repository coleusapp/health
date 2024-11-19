<?php

namespace App\Casts;

use App\Concerns\DistanceConcern;
use App\Concerns\WeightConcern;
use App\Settings\GeneralSettings;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class DistanceCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->distance_unit ?? app(GeneralSettings::class)->distance_unit) {
            'mile' => round(app(DistanceConcern::class)->mToMi($value), 2),
            'meter' => round($value, 2),
            'kilometer' => round(app(DistanceConcern::class)->mToKm($value), 2),
            default => 0,
        } : null;
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->distance_unit ?? app(GeneralSettings::class)->distance_unit) {
            'mile' => app(DistanceConcern::class)->MiToM($value),
            'meter' => $value,
            'kilometer' => app(DistanceConcern::class)->KmToM($value),
            default => 0,
        } : null;
    }
}
