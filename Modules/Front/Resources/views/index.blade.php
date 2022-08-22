@extends('front::layouts.master')

@section('script')
    <script>
        const validateCheckedQuantity = (object) => {
            if (!object.checked) {
                return;
            }

            const check_max = 2;
            let cnt = 0;
            let object_name = object.name;
            let element_length = document.forms[0].elements[object_name].length;

            for (let i = 0; i < element_length; i++) {
                if (document.forms[0].elements[object_name][i].checked) {
                    cnt++;
                    if (cnt > check_max) {
                        object.checked = false;
                        break;
                    }
                }
            }
        }
        const checkFishingStyleChecked = (event) => {
            let flag = false;
            const checkboxes = document.getElementsByClassName('entry-checkbox');

            event.preventDefault();

            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    flag = true;
                }
            }

            if (flag === false) {
                alert("エントリーする魚種を選択してください。");
            }
        }

        const checkbox_init = () => {
            const checkboxes = document.getElementsByClassName('entry-checkbox');


            for (let i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        }

        // FIXME ;-(
        @foreach($fishing_styles as $fishing_style)
        /* ------- */
        const fish_input{{ $fishing_style->id }} = document.getElementById('fish{{ $fishing_style->id }}');
        const fish_image{{ $fishing_style->id }} = document.getElementById('image--fish{{ $fishing_style->id }}');

        fish_input{{ $fishing_style->id }}.addEventListener('click', function () {
            fish_image{{ $fishing_style->id }}.style.zIndex = fish_input{{ $fishing_style->id }}.checked ? 2 : -1;
        });
        /* ------- */
        @endforeach

        checkbox_init();
    </script>
@endsection

@section('content')
    <section class="bg-white">
        <figure class="relative">
            <img style="filter:opacity(0.5) blur(2px);" src="{{ asset('assets/front/images/shugo.jpg') }}" alt="集合写真">
            <figcaption class="mt-2 absolute w-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-10">
                <img src="{{ asset('assets/front/images/title_bl.png') }}" alt="前田杯 秋の磯釣り大会"
                     class="max-w-screen object-contain logo mx-auto px-8">
            </figcaption>
        </figure>
        <div class="pt-4 pb-16 px-4">
            <p class="mb-4">
                岡山県は下津井の沖磯で行われる釣り大会です。お好きな魚種を2つまで選んで頂き、下部のフォームよりエントリーしてください。
            </p>
            <section class="px-3 py-6 mx-auto mb-8 bg-cyan-50 rounded shadow container--sm">
                <h2 class="text-xl mb-6 font-bold text-center">
                    大会の概要
                </h2>
                @foreach($tournament_details as $tournament_detail)
                    <dl class="border-b py-2 flex">
                        <dt class="w-3/12 font-bold">
                            {{ $tournament_detail['title'] }}
                        </dt>
                        <dd class="w-9/12">
                            {!! nl2br($tournament_detail['detail']) !!}
                        </dd>
                    </dl>
                @endforeach
            </section>
            @if(!$is_reservable)
                <section class="rounded-3xl bg-red-400 p-4 w-full mb-16">
                    <h2 class="mb-2 text-white font-bold text-lg">
                        受付終了のお知らせ
                    </h2>
                    <p class="text-white mb-4">
                        {{ $tournament->name }}の応募ページをご覧頂きありがとうございます。<br>
                        ただいま、大会へのご応募が定員の30人に達した為、受付を終了させていただいております。<br>
                        よろしければ、次回のご参加をお待ちしております。
                    </p>
                </section>
            @endif
            <section>
                <h2 class="text-xl text-center my-4 font-bold">
                    {{ $title }}
                </h2>
                @include('front::components.form.error')
                <form name="entry_form" action="{{ $endpoint }}" method="{{ $method }}">
                    @csrf
                    <input type="hidden" name="tournament_id" value="1">
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-2" for="">
                            <span class="font-bold">参加魚種</span> ※2つまで選択可能です！
                        </label>
                        <ul class="flex flex-wrap">
                            @foreach($fishing_styles as $i => $fishing_style)
                                <li class="w-1/2 relative">
                                    <label for="fish{{ $fishing_style->id }}" class="fish-image"
                                           style="background-image: url('{{ asset('assets/front/images/' . $fishing_style->name . '.png') }}')">
                                    <span id="image--fish{{ $fishing_style->id }}" class="entry-cover">
                                        <span class="entry-cover__status">
                                            エントリー済み
                                        </span>
                                    </span>
                                    </label>
                                    <input id="fish{{ $fishing_style->id }}" class="entry-checkbox hidden"
                                           type="checkbox"
                                           onclick="validateCheckedQuantity(this)" name="fishing_style[]"
                                           value="{{ $fishing_style->id }}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-4">
                        @include('front::components.form.input-text', [
                            'title' => 'お名前',
                            'name' => 'name',
                            'placeholder' => '',
                            'required' => true,
                        ])
                    </div>
                    <div class="mb-4">
                        @include('front::components.form.input-tel', [
                            'title' => '電話番号',
                            'name' => 'tel',
                            'required' => true,
                        ])
                    </div>
                    <div class="mb-4">
                        @include('front::components.form.input-email', [
                            'title' => 'メールアドレス',
                            'name' => 'email',
                            'placeholder' => '',
                            'required' => true,
                        ])
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold text-sm text-gray-700" for="fellowship">
                            大会終了後の親睦会への参加
                        </label>
                        <select name="fellowship" id="fellowship"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                            <option value="1">
                                参加する
                            </option>
                            <option value="0">
                                参加しない
                            </option>
                        </select>
                    </div>
                    <div class="mt-8">
                        <div id="terms_agree" class="px-8 py-6 mx-auto mb-8 bg-cyan-50 rounded shadow container--sm">
                            <h2 class="mb-6 font-bold text-center">
                                個人情報に関する確認
                            </h2>
                            <ul class="text-sm mb-4">
                                <li class="mb-2">
                                    ・メールアドレスは大会情報のお届けで使用いたします。
                                </li>
                                <li class="mb-2">
                                    ・電話番号は大会中のトラブル対応の目的で使用いたします。
                                </li>
                                <li>
                                    ・大会中に撮影した動画や写真は、今後の運営で使用させていただくことがあります。
                                </li>
                            </ul>
                            <p class="text-sm">
                                ※ 上記以外の目的で個人情報を使うことはございません。
                            </p>
                        </div>
                        <button type="{{ $is_reservable ? 'submit' : 'button' }}" onclick="checkFishingStyleChecked()"
                                class="w-8/12 block cursor-pointer mx-auto rounded-3xl py-2 px-4 bg-cyan-600 font-bold text-white">
                            応募する
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </section>
@endsection
