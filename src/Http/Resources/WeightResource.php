<?php

namespace Coleus\Health\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \Coleus\Health\Models\Weight
 */
class WeightResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this?->id,
            'weight' => $this->weight ?? 1,
            'date' => $this?->date?->format('Y-m-d\TH:i') ?? now()->format("Y-m-d\TH:i"),
            'date_string' => $this?->date?->toDateTimeString(),
            'date_for_humans' => $this?->date?->diffForHumans(),
        ];
    }
}
