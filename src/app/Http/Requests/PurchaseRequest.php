<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'payment_method' => 'required',
            'post_code' => 'required|regex:/^\d{3}-\d{4}$/',
            'address'     => 'required|string|max:255',
            'building'    => 'nullable|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'payment_method.required' => '支払い方法を選んでください',
            'post_code.required' => '郵便番号を入力してください',
            'post_code.regex'    => '郵便番号の形式が正しくありません',
            'address.required'     => '配送先の住所を入力してください',
        ];
    }
}
