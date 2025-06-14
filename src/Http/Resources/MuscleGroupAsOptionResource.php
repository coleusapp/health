<?php

namespace Coleus\Health\Http\Resources;

use Coleus\Support\Concerns\NullableResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \Coleus\Health\Models\Category
 */
class MuscleGroupAsOptionResource extends JsonResource
{
    use NullableResourceCollection;

    public function toArray(Request $request): array
    {
        return [
            'label' => $this->name ?? $this->getLabel(),
            'value' => $this->id ?? $this->value,
        ];
    }
}
