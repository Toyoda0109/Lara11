<?php

namespace App\Http\Requests;

use App\Rules\RequiredIfNamashi;
use Illuminate\Foundation\Http\FormRequest;


class UserSaveRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'nickname' => ['nullable', 'string', 'max:255', new RequiredIfNamashi($this->input('name'))],
            'email' => ['required', 'string', 'lowercase', 'email:filter', 'max:255'],
        ];
    }

    public function attributes(): array {
        return [
            'name' => 'お名前', 
            'nickname' => 'ニックネーム', 
            'email' => 'メールアドレス',
        ];
    }

    public function messages(): array {
        return [
            'name.required' => ':attributeは必ず入力してください'
        ];
    }
}
