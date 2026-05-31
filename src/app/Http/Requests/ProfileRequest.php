<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png'],
            'name' => ['required', 'string', 'max:20'],
            'profile_message' => ['nullable', 'string', 'max:100'],
        ];
    }


    public function messages()
    {
        return [
            'avatar.image'  => 'プロフィール画像は画像ファイルを選択してください。',
            'avatar.mimes'  => 'プロフィール画像はjpegまたはpng形式でアップロードしてください。',
            'name.required' => 'ペンネームを入力してください。',
            'name.max'      => 'ペンネームは20文字以内で入力してください。',
            'profile_message.max'      => '自己紹介は100文字以内で入力してください。',
        ];
    }

}

