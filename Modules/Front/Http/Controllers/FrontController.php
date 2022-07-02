<?php

namespace Modules\Front\Http\Controllers;

use App\Models\Fish;
use http\Exception\RuntimeException;
use Modules\Front\Http\Requests\EntryRequest;

class FrontController
{
    public function index()
    {
        $title = '申込みフォーム';

        $endpoint = route('post');
        $method = 'POST';

        $fishing_styles = Fish::whereIn('id',[1,2,3,4])->get();

        return view('front::index', compact(
            'title',
            'endpoint',
            'method',
            'fishing_styles'
        ));
    }

    public function entry(EntryRequest $request)
    {
        if(count($request->get('fishing_style')) > 2) {
            throw new RuntimeException('エントリーできる魚種は2つまでです。');
        }

        $title = 'ご応募ありがとうございました。';
        $entry = $request->all();
        $fishing_styles = Fish::whereIn('id', $entry['fishing_style'])->get();

        return view('front::complete', compact(
            'title',
            'entry',
            'fishing_styles',
        ));
    }
}
