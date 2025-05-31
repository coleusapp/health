<?php

namespace Coleus\Health\Http\Requests\WorkoutCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('toothpaste_types', 'name')->ignore($this->route('toothpaste_type')->id),
            ],
        ];
    }
}
