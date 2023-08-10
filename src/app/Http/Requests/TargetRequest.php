<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TargetRequest extends FormRequest
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
            'target' => 'required|integer|min: 1',
            'achieved' => 'integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'target.required' => '目標金額は必須です。',
            'target.min:1' => '目標金額は1万円から登録できます。',
            'achieved.min:0' => '達成金額はマイナスにはできません。',
            
        ];
    }
}
