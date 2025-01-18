<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewReviewRequest extends FormRequest
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
            'evaluation' => 'required',
            'comment' => 'max:400',
            'image' => 'nullable | max:10000 | mimes:jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'evaluation.required' => '1～5の評価を入力してください',
            'comment.max' => '400文字以内で入力してください',
            'image.max' => '10MBを超えるファイルは添付できません',
            'image.mimes' => '指定外のファイルは添付できません',
        ];
    }
}
