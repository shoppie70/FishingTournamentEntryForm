<?php

namespace Modules\Front\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'staff_number' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Password::defaults()],
        ];
    }

    public function messages()
    {
        return [
            'staff_number' => '職員番号',
            'name' => 'お名前',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }
}
