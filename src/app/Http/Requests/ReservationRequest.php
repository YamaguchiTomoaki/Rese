<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
    public function prepareForValidation()
    {
        $date_time = ($this->filled(['date', 'time'])) ? $this->date . ' ' . $this->time : '';
        $this->merge([
            'date_time' => $date_time
        ]);
    }

    public function rules(): array
    {
        return [
            'date' => 'required | after:yesterday',
            'time' => 'required|date_format:H:i',
            'number' => 'min:1 | max:10',
            'date_time' => 'after:now',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '予約日を入力してください',
            'date.after' => '予約日を変更してください',
            'number.min' => '予約人数に1人以上の人数を選んでください',
            'number.max' => '予約人数を10人以下に変更してください',
            'date_time.after' => '予約時刻を変更してください',
        ];
    }
}
