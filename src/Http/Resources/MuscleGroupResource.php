<?php

namespace Coleus\Health\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \Coleus\Health\Models\MuscleGroup
 */
class MuscleGroupResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'muscle_group_id' => $this->muscle_group_id,
            'parent' => MuscleGroupResource::make($this->whenLoaded('parent')),
        ];
    }
}
