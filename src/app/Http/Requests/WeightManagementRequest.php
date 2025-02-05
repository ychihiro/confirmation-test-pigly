<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightManagementRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'date' => 'required|before_or_equal:today',
            'weight' => 'required|regex:/^\d{1,3}(\.\d{1})?$/',
            'calorie' => 'nullable|integer',
            'time' => 'nullable|regex:/^\d{2}:\d{2}$/',
            'content' => 'nullable'|'max:120',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'date.before_or_equal' => '明日以降の日付は入力できません',
            'weight.required' => '体重を入力してください',
            'weight.regex' => '体重は整数部分が最大3桁、小数点以下が最大1桁までとなる数値で入力してください。',
            'calorie.integer' => '摂取カロリーは整数値で入力してください',
            'time.regex' => '運動時間はhh:mm形式で入力してください',
        ];
    }
}
