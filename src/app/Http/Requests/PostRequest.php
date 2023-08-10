<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'month' => 'required|min:1|integer',
            'amount' => 'required|min:1|integer',
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'month.required' => '達成までの時間を入力してください。',
            'month.min:1' => '達成までの時間は1か月から登録できます。',
            'month.integer' => '達成までの時間は数字で入力してください。',
            'amount.required' => '達成金額を入力してください。',
            'amount.min:1' => '達成金額は1万円から登録できます。',
            'amount.integer' => '達成金額は数字で入力してください。',
            'title.required' => 'タイトルを入力してください。',
            'content.required' => '本文を入力してください。',
        ];
    }
}
