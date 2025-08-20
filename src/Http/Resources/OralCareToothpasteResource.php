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
class OralCareToothpasteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'oral_care_id' => $this->pivot->oral_care_id,
            'toothpaste_id' => $this->pivot->toothpaste_id,
        ];
    }
}
