<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopCreateRequest extends FormRequest
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
            'name' => 'required | string | max:255',
            'areas' => 'required',
            'genres' => 'required',
            'overview' => 'required | string | max:255',
            'image' => 'required | max:10000 | mimes:jpg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '店名を入力してください',
            'name.string' => '店名を文字列で入力してください',
            'name.max' => '店名を255文字以内で入力してください',
            'areas.required' => '地域を入力してください',
            'genres.required' => 'ジャンルを入力してください',
            'overview.required' => '店舗概要を入力してください',
            'overview.string' => '店舗概要を文字列で入力してください',
            'overview.max' => '店舗概要を255文字以内で入力してください',
            'image.required' => '店舗画像を選択してください',
            'image.max' => '10MBを超えるファイルは添付できません',
            'image.mimes' => '指定外のファイルは添付できません',
        ];
    }
}
