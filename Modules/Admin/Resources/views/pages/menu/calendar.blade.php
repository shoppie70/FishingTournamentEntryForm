@extends('admin::layouts.master')

@section('content')

    <div class="px-4 -m-24 mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                {{ $title }}
            @endslot
            <p class="ml-4 mb-4 text-sm">
                ※ 献立入力後は、<span class="p-1 text-xs bg-gray-200 mx-1">エンターキー</span>または<span
                    class="p-1 text-xs bg-gray-200 mx-1">保存ボタン</span>を押して、データを保存してください。
            </p>
            <div class="p-4">
                @include('admin::components.form.errors')
            </div>
            <div class="flex justify-end px-4">
                <a href="{{ route('admin.menu.print.staff',['year' => $year, 'month' => $month]) }}"
                   class="btn-primary">
                    職員様用 昼定食メニュー表の印刷
                </a>
                <a href="{{ route('admin.menu.print.kitchen',['year' => $year, 'month' => $month]) }}"
                   class="btn-secondary">
                    キッチン用カレンダーの印刷
                </a>
            </div>
            <form class="api_form" method="{{ $method }}" action="{{ $endpoint }}">
                @csrf
                @include('admin::components.menu_calendar')
                <div class="p-4 text-right">
                    <button type="submit" class="btn-primary">
                        保存する
                    </button>
                </div>
            </form>
        @endcomponent
    </div>
@endsection
