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

        $tournament_details = [
            [
                'title' => '日時',
                'detail' => '2022年9月24日(土)4:30~12:00
                受付開始3:00, 予備日10月8日',
            ],
            [
                'title' => '料金',
                'detail' => '参加費1,500円 + 渡船代',
            ],
            [
                'title' => '対象魚',
                'detail' => '黒鯛・真鯛・青物・アコウ',
            ],
            [
                'title' => 'ルール',
                'detail' => '①エントリー時に対象魚の中から自分が勝負したい魚種を2つ選択してください。
                ②くじ引きを行い、番号の若い人からポイントを選んでいただきます。
                ③釣り方は自由。ただし投げ釣りは投げ釣りは竿2本まで。
                定員は30名まで、締め切りは9月15日となります。',
            ],
            [
                'title' => '景品',
                'detail' => '参加賞：QUOカード500円分
                各部門：優勝者と2位の方には景品あり
                じゃんけん大会：おむやさんのお食事券5名',
            ],
            [
                'title' => '協賛',
                'detail' => 'たい公望/おむや/個人スポンサー：匿名様',
            ],
        ];

        return view('front::index', compact(
            'title',
            'endpoint',
            'method',
            'fishing_styles',
            'is_reservable',
            'tournament',
            'tournament_details'
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
