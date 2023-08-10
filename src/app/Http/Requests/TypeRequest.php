<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'target' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'target.required' => '目標額は必須です。',
            'target.string' => '目標額は数字で入力してください。',
        ];
    }
}
