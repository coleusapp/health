<?php

namespace Coleus\Health\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \Coleus\Health\Models\Toothpaste
 */
class ToothpasteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this?->id,
            'name' => $this->name ?? null,
        ];
    }
}
