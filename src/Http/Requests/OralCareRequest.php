<?php

namespace Coleus\Health\Http\Requests;

use Coleus\Health\Models\Toothpaste;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OralCareRequest extends FormRequest
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
            'date' => 'required|date',
            'duration' => 'nullable|numeric|min:1',
            'brushed' => 'nullable|boolean',
            'flossed' => 'nullable|boolean',
            'fluoride_taken' => 'nullable|boolean',
            'toothpastes.*.toothpaste_id' => [
                'nullable',
                'numeric',
                'gte:0',
                Rule::exists(Toothpaste::class, 'id')
            ],
        ];
    }
}
