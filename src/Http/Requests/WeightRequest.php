<?php

namespace Coleus\Health\Http\Requests;

use Coleus\Health\Enums\WeightEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WeightRequest extends FormRequest
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
            'weight' => 'required|numeric|min:1',
            'date' => [
                'required',
                Rule::date()->before(now()->addCentury()),
            ],
            'unit' => [
                'required',
                Rule::enum(WeightEnum::class)
            ],
        ];
    }
}
