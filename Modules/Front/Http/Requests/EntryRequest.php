<?php

namespace Modules\Front\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryRequest  extends FormRequest
{
    public function rules(): array
    {
        return [
            'fishing_style' => 'required|array|exists:fish,id',
            'name' => 'required|string',
            'tel' => 'required|string|',
            'email' => 'required|email:rfc,dns',
            'fellowship' => 'required|boolean',
        ];
    }

    public function attributes(): array
    {
        return [
            'fishing_style' => '参加魚種',
            'name' => '名前',
            'tel' => '電話番号',
            'email' => 'メールアドレス',
            'fellowship' => '親睦会への参加',
        ];
    }
}
