<?php

namespace Coleus\Health\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \Coleus\Health\Models\Workout
 */
class WorkoutResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date->format('Y-m-d\TH:i'),
            'date_string' => $this->date->toDatetimeString(),
            'date_for_humans' => $this->date->diffForHumans(),
            'exercises' => ExerciseWorkoutResource::collection($this->whenLoaded('exercises')),
            'exercises_count' => $this->whenCounted('exercises'),
        ];
    }
}
