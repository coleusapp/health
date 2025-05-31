<?php

namespace Coleus\Health\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property integer $id
 * @property integer|null $reps
 * @property integer|null $weight
 * @property integer|null $distance
 * @property integer|null $duration
 * @property integer|null $calorie
 */
class ExerciseWorkoutResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->pivot->exercise_id,
            'reps' => $this->pivot->reps,
            'weight' => $this->pivot->weight,
            'distance' => $this->pivot->distance,
            'duration' => $this->pivot->duration,
            'calorie' => $this->pivot->calorie,
        ];
    }
}
