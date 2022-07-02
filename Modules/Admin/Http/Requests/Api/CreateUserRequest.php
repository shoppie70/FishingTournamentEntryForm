<?php

namespace Modules\Admin\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'staff_number' => 'required|integer',
            'name' => 'nullable|string',
            'department_id' => 'nullable|integer',
            'email' => 'nullable|string',
            'is_retired' => 'nullable|bool',
            'is_temporary' => 'nullable|bool',
        ];
    }

    public function attributes()
    {
        return [
            'staff_number' => '職員番号',
            'name' => '職員名',
            'department_id' => '部署ID',
            'email' => 'メールアドレス',
            'is_retired' => '退職済み',
            'is_temporary' => '仮会員',
        ];
    }
}
