<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlternativeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:4',
            'rainfall' => 'required|string',
            'soil_type' => 'required|string',
            'nitrogen' => 'required|integer',
            'phospor' => 'required|integer',
            'kalium' => 'required|integer',
            'price' => 'required|integer',
        ];
    }
}
