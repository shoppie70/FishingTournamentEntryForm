<?php

namespace Modules\Admin\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
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
            'serves' => 'required|integer',
            'billing_amount' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'date' => '年月',
            'serves' => '提供分',
            'billing_amount' => '請求金額',
        ];
    }
}
