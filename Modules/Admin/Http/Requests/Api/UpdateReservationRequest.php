<?php

namespace Modules\Admin\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
            'date' => 'required|date',
            'place_id' => 'nullable|integer',
            'is_cancelled' => 'nullable|bool',
        ];
    }

    public function attributes()
    {
        return [
            'date' => '日付',
            'is_cancelled' => 'キャンセルフラグ',
        ];
    }
}
