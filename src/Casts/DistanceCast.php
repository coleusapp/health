<?php

namespace Coleus\Health\Casts;

use Coleus\Health\Contracts\Distance;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class DistanceCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->distance_unit) { //  ?? app(GeneralSettings::class)->distance_unit
            'mile' => round(Distance::class->mToMi($value), 2),
            'meter' => round($value, 2),
            'kilometer' => round(Distance::class->mToKm($value), 2),
            default => 0,
        } : null;
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->distance_unit) {
            'mile' => Distance::class->MiToM($value),
            'meter' => $value,
            'kilometer' => Distance::class->KmToM($value),
            default => 0,
        } : null;
    }
}
