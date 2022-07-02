<?php

namespace Modules\Admin\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|integer',
            'password' => 'nullable|string',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '日付',
            'email' => 'メールアドレス',
            'role' => '権限',
            'password' => 'パスワード',
        ];
    }
}
