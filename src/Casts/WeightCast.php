<?php

namespace Coleus\Health\Casts;

use Coleus\Health\Contracts\Weight;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class WeightCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->weight_unit) { //  ?? app(GeneralSettings::class)->weight_unit
            'kg' => round(Weight::class->gToKg($value), 2),
            'lbs' => round(Weight::class->gToLbs($value), 2),
            default => 0,
        } : null;
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? match ($model->exercise?->weight_unit) {
            'kg' => Weight::class->kgToG($value),
            'lbs' => Weight::class->lbsToG($value),
            default => 0,
        } : null;
    }
}
