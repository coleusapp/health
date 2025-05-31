<?php

namespace Coleus\Health\Http\Requests;

use Coleus\Health\Models\Exercise;
use Coleus\Support\Concerns\FlattenArray;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkoutSaveRequest extends FormRequest
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
            'date' => 'required',
            'exercises.*.id' => [
                'required',
                'numeric',
                'gt:0',
                Rule::exists(Exercise::class, 'id')
            ],
            'exercises.*.calorie' => [
                'nullable',
                'numeric',
                'gt:0',
            ],
            'exercises.*.duration' => [
                'nullable',
                'numeric',
                'gt:0',
            ],
            'exercises.*.distance' => [
                'nullable',
                'numeric',
                'gt:0',
            ],
            'exercises.*.reps' => [
                'nullable',
                'numeric',
                'gt:0',
            ],
            'exercises.*.weight' => [
                'nullable',
                'numeric',
                'gt:0',
            ],
        ];
    }
}
