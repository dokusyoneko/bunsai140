<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NovelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // 投稿する（publish）のときだけ 140 字制限
        if ($this->input('action') === 'publish') {
            return [
                'body' => 'required|string|max:140',
            ];
        }

        // draft のときは 140 字制限なし
        return [
            'body' => 'required|string',
        ];
    }

    public function messages()
{
    return [
        'body.required' => '本文が書かれていません',
        'body.string'   => '本文は文字列で入力してください',
        'body.max'      => '140字を超えています',
        'body.max.string' => '140字を超えています',
    ];
}


    public function attributes()
{
    return [
        'body' => '本文',
    ];
}
}

