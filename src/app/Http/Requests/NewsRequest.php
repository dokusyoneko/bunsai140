<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:30'],
            'body' => ['required', 'string', 'max:200'],
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max'      => 'タイトルは30文字以内で入力してください',
            'body.required'  => '本文を入力してください',
            'body.max'      => '本文は200文字以内で入力してください',
        ];
    }

}

