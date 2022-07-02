<?php

namespace Modules\Admin\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationPlaceRequest extends FormRequest
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
            'departments' => 'nullable|array',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'departments' => '部署ID',
        ];
    }
}
