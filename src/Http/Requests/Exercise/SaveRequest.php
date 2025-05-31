<?php

namespace Coleus\Health\Http\Requests\Exercise;

use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Models\Category;
use Coleus\Health\Models\MuscleGroup;
use Coleus\Support\Concerns\FlattenArray;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveRequest extends FormRequest
{
    use FlattenArray;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'nullable',
            'has_rep' => 'boolean',
            'has_weight' => 'boolean',
            'has_distance' => 'nullable|boolean',
            'has_calorie' => 'nullable|boolean',
            'weight_unit' => [
                'nullable',
                Rule::requiredIf($this->request->get('has_weight')),
                Rule::enum(WeightEnum::class)
            ],
            'distance_unit' => [
                'nullable',
                Rule::requiredIf($this->request->get('has_distance')),
                Rule::enum(DistanceEnum::class)
            ],
            'has_duration' => 'nullable|boolean',
            'duration_unit' => [
                'nullable',
                Rule::requiredIf($this->request->get('has_duration')),
                Rule::enum(DurationEnum::class)
            ],
            'categories.*.id' => [
                'numeric',
                'gt:0',
                Rule::exists(Category::class, 'id')
            ],
            'muscle_groups.*.id' => [
                'numeric',
                'gt:0',
                Rule::exists(MuscleGroup::class, 'id')
            ],
        ];
    }
}
