@extends('front::layouts.master')

@section('script')
    <script>
        history.pushState(null, null, location.href);
        window.addEventListener('popstate', (e) => {
            history.go(1);
        });
    </script>
@endsection

@section('content')
    <section class="h-screen">
        <div class="rounded-3xl bg-white pt-4 pb-16 px-4">
            <h2 class="my-4 font-bold">
                {{ $title }}
            </h2>
            <p class="leading-7 mb-4">
                {{ $entry->name }}様、この度は「{{ config('about.tournament_name') }}」に<br class="md:hidden">ご応募頂き<br class="hidden md:inline-block">
                誠にありがとうございます。
            </p>
            <p class="leading-7 mb-4">
                エントリーナンバーは<span class="text-lg font-bold">{{ $entry->entry_number }}番</span>となります。当日はエントリーナンバーを主催者にお伝え下さい。<br>大会は{{ $entry->tournament->date->format('Y年n月j日') }}の開催予定になります。<br>
                以下、ご応募いただきました情報を確認させていただきます。
            </p>
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 mb-2" for="">
                    参加魚種
                </label>
                <ul class="flex flex-wrap">
                    @foreach($fishing_styles as $i => $fishing_style)
                        <li class="w-1/2 relative">
                            <label for="fish{{ $fishing_style->id }}" class="fish-image"
                                   style="background-image: url('{{ asset('assets/front/images/' . $fishing_style->name . '.png') }}')">
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-4">
                @include('front::components.form.input-text', [
                    'title' => 'お名前',
                    'name' => 'name',
                    'placeholder' => '',
                    'value' => $entry->name,
                    'readonly' => true
                ])
            </div>
            <div class="mb-4">
                @include('front::components.form.input-tel', [
                    'title' => '電話番号',
                    'name' => 'tel',
                    'value' => $entry->tel,
                    'readonly' => true
                ])
            </div>
            <div class="mb-4">
                @include('front::components.form.input-email', [
                    'title' => 'メールアドレス',
                    'name' => 'email',
                    'placeholder' => '',
                    'value' => $entry->email,
                    'readonly' => true
                ])
            </div>
            <div class="mb-4">
                @include('front::components.form.input-email', [
                    'title' => '大会終了後の親睦会への参加',
                    'name' => 'fellowship',
                    'placeholder' => '',
                    'value' => $entry->is_join_fellowship ? '参加する' : '参加しない',
                    'readonly' => true
                ])
            </div>
        </div>
    </section>
@endsection
