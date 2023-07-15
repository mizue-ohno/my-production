<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemFormRequest extends FormRequest
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
            'type' => 'required',
            'detail' => 'max:500',
            'image' => 'file | max:45 | mimes:jpeg,png,jpg,pdf',
            'buy_date' => 'required',
            'color' => 'required',
            'season' => 'required',
            'brand' => 'max:16',
    ];
    }

    public function messages()
    {
        return[
        'type.required' => 'カテゴリーを選択してください。',
        'detail.max' => '詳細は500文字以内で入力してください。',
        'image.max' => '画像ファイルは45KB以下にしてください。',
        'image.mines' => 'このファイル形式では登録できません。',
        'buy_date.required' => '購入日を選択してください。',
        'color.required' => 'カラーを選択してください。',
        'season.required' =>'着用シーズンを選択してください。',
        'brand.max' => 'ブランド名は16文字以内で入力してください。',
        ];

    }
}
