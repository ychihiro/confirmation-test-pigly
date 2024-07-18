<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserWeightSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current_weight' => ['required', 'regex:/^\d{1,3}(\.\d{1})?$/'], // 整数値3桁までかつ小数点以下1桁までの数値
            'target_weight' => ['required', 'regex:/^\d{1,3}(\.\d{1})?$/'],
        ];
    }

    public function messages()
    {
        return [
            'current_weight.required' => '現在の体重を入力してください',
            'current_weight.regex' => '現在の体重は整数部分が最大3桁、小数点以下が最大1桁までとなる数値で入力してください。',
            'target_weight.required' => '目標体重を入力してください',
            'target_weight.regex' => '目標体重は整数部分が最大3桁、小数点以下が最大1桁までとなる数値で入力してください。',
        ];
    }
}
