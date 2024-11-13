<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject' => 'required | string',
            'maintext' => 'required | string',
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => '件名を入力してください',
            'subject.string' => '件名を文字列で入力してください',
            'maintext.required' => '本文を入力してください',
            'maintext.string' => '本文を文字列で入力してください',
        ];
    }
}
