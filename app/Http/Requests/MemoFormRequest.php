<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemoFormRequest extends FormRequest
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
            'type' => 'required|max:16',
            'detail' => 'max:500',
            'image' => 'file | max:45 | mimes:jpeg,png,jpg,pdf',
            'color' => 'required',
            'season' => 'required|max:16',
            'brand' => 'max:16',
            'price' => 'nullable|integer|min:0',

        ];
    }

    public function messages()
    {
        return [

            'type.required' => 'カテゴリーを選択してください。',
            'detail.max' => '詳細は500文字以内で入力してください。',
            'image.max' => '画像ファイルは45KB以下にしてください。',
            'image.mines' => 'このファイル形式では登録できません。',
            'color.required' => 'カラーを選択してください。',
            'season.required' => '着用シーズンを選択してください。',
            'brand.max' => 'ブランド名は16文字以内で入力してください。',
            'price.integer' => '価格は整数で入力してください。',
            'price.min' => '価格は0以上の整数で入力してください。',



        ];
    }
}
