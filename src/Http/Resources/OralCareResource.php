<?php

namespace Coleus\Health\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \Coleus\Health\Models\OralCare
 */
class OralCareResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'date' => $this?->date?->format('Y-m-d\TH:i') ?? now()->format("Y-m-d\TH:i"),
            'date_string' => $this?->date?->toDateTimeString(),
            'date_for_humans' => $this?->date?->diffForHumans(),
            'duration' => $this->duration,
            'brushed' => $this->brushed,
            'flossed' => $this->flossed,
            'fluoride_taken' => $this->fluoride_taken,
            'toothpastes' => OralCareToothpasteResource::collection($this->whenLoaded('toothpastes')),
        ];
    }
}
