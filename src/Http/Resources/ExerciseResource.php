<?php

namespace Coleus\Health\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \Coleus\Health\Models\Exercise
 */
class ExerciseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'has_rep' => $this->has_rep,
            'has_weight' => $this->has_weight,
            'weight_unit' => $this->weight_unit,
            'has_distance' => $this->has_distance,
            'distance_unit' => $this->distance_unit,
            'has_calorie' => $this->has_calorie,
            'calorie_unit' => $this->calorie_unit,
            'has_duration' => $this->has_duration,
            'duration_unit' => $this->duration_unit,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'muscle_groups' => MuscleGroupResource::collection($this->whenLoaded('muscleGroups')),
        ];
    }
}
