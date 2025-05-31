<?php

namespace Coleus\Health\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Coleus\Health\Http\Resources\CategoryResource;
use Coleus\Health\Http\Resources\MuscleGroupResource;

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
            'has_distance' => $this->has_distance,
            'has_calorie' => $this->has_calorie,
            'weight_unit' => $this->weight_unit,
            'distance_unit' => $this->distance_unit,
            'has_duration' => $this->has_duration,
            'duration_unit' => $this->duration_unit,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'muscle_groups' => MuscleGroupResource::collection($this->whenLoaded('muscleGroups')),
        ];
    }
}
