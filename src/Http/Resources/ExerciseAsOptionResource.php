<?php

namespace Coleus\Health\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \Coleus\Health\Models\Exercise
 */
class ExerciseAsOptionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'label' => $this->name,
            'value' => $this->id,
            'has_rep' => $this->has_rep,
            'has_weight' => $this->has_weight,
            'weight_unit' => $this->when($this->has_weight, fn() => $this->weight_unit),
            'has_distance' => $this->has_distance,
            'distance_unit' => $this->when($this->has_distance, fn() => $this->distance_unit),
            'has_duration' => $this->has_duration,
            'duration_unit' => $this->when($this->has_duration, fn() => $this->duration_unit),
            'has_calorie' => $this->has_calorie,
            'calorie_unit' => $this->when($this->has_calorie, fn() => $this->calorie_unit),
        ];
    }
}
