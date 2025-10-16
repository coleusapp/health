<?php

namespace Coleus\Health\Http\Requests;

use Coleus\Health\Enums\CalorieEnum;
use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Models\Exercise;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkoutRequest extends FormRequest
{

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
            'date' => 'required',
            'exercises.*.id' => [
                'required',
                'numeric',
                'gte:0',
                Rule::exists(Exercise::class, 'id')
            ],
            'exercises.*.calorie' => [
                'nullable',
                'numeric',
                'gte:0',
            ],
            'exercises.*.calorie_unit' => [
                'nullable',
                Rule::enum(CalorieEnum::class),
            ],
            'exercises.*.duration' => [
                'nullable',
                'numeric',
                'gte:0',
            ],
            'exercises.*.duration_unit' => [
                'nullable',
                Rule::enum(DurationEnum::class),
            ],
            'exercises.*.distance' => [
                'nullable',
                'numeric',
                'gte:0',
            ],
            'exercises.*.distance_unit' => [
                'nullable',
                Rule::enum(DistanceEnum::class),
            ],
            'exercises.*.reps' => [
                'nullable',
                'numeric',
                'gte:0',
            ],
            'exercises.*.weight' => [
                'nullable',
                'numeric',
                'gte:0',
            ],
            'exercises.*.weight_unit' => [
                'nullable',
                Rule::enum(WeightEnum::class),
            ],
        ];
    }
}
