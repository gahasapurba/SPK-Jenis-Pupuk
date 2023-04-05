<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssessmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
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
            'phosphor' => 'required|integer',
            'kalium' => 'required|integer',
            'price' => 'required|integer',
        ];
    }
}
