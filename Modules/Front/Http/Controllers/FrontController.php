<?php

namespace Modules\Front\Http\Controllers;

use App\Models\Fish;
use App\Models\Tournament;
use Exception;
use http\Exception\RuntimeException;
use Illuminate\Support\Facades\DB;
use Modules\Front\Http\Requests\EntryRequest;
use Modules\Front\UseCases\Entry\SaveEntryAction;
use Modules\Front\UseCases\Entry\SaveEntryNumberAction;

class FrontController
{
    public function index()
    {
        $title = '申込みフォーム';

        $endpoint = route('post');
        $method = 'POST';

        $fishing_styles = Fish::whereIn('id', [1, 2, 3, 4])->get();
        $tournament = Tournament::find(1);

        $is_reservable = true;
        if ($tournament->last_entry_number > 29) {
            $is_reservable = false;
        }

        return view('front::index', compact(
            'title',
            'endpoint',
            'method',
            'fishing_styles',
            'is_reservable',
            'tournament'
        ));
    }

    public function entry(EntryRequest $request)
    {
        DB::beginTransaction();

        try {
            if (count($request->get('fishing_style')) > 2) {
                throw new RuntimeException('エントリーできる魚種は2つまでです。');
            }

            $entry = (new SaveEntryAction())($request->all());
            (new SaveEntryNumberAction)($entry);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            report($exception);

            return redirect()->back()->withErrors($exception->getMessage() ?: '正常に予約できませんでした。再度、お試しください。');
        }

        $title = 'ご応募ありがとうございました。';
        $fishing_styles = Fish::whereIn('id', $request['fishing_style'])->get();

        return view('front::complete', compact(
            'title',
            'entry',
            'fishing_styles',
        ));
    }
}
