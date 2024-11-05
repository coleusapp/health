<?php

namespace App\Services;

use App\Models\Exercise;
use App\Settings\GeneralSettings;

class ExercisePostfixService
{
    static array $cache = [];

    public static function postfix(?int $id): array
    {
        if (static::$cache[$id] ?? false) {
            return static::$cache[$id];
        }

        $defaults = [
            'weight_unit' => app(GeneralSettings::class)->weight_unit,
            'distance_unit' => app(GeneralSettings::class)->distance_unit,
            'duration_unit' => app(GeneralSettings::class)->duration_unit,
        ];

        if (!$id) {
            return $defaults;
        }

        $exercise = Exercise::find($id);

        if (!$exercise) {
            return $defaults;
        }

        $exerciseUnits = [
            'weight_unit' => $exercise?->weight_unit,
            'distance_unit' => $exercise?->distance_unit,
            'duration_unit' => $exercise?->duration_unit,
        ];

        $postfix = array_merge($defaults, $exerciseUnits);

        static::$cache[$exercise->id] = $postfix;

        return $postfix;
    }
}
