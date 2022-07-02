@extends('admin::layouts.master')

@section('script')
    <script>
        flatpickr("#datepicker", {
            locale: 'ja',
        });
    </script>
@endsection

@section('content')
    <div class="px-4 -m-24  mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                予約検索
            @endslot
            <div class="flex-auto px-4 pb-4">
                <form action="">
                    <div class="flex flex-wrap w-full mb-4">
                        <div class="w-1/3 px-2">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                職員名で検索
                            </label>
                            <input type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{ request('name') ?? '' }}"
                                   name="name"
                            >
                        </div>
                        <div class="w-1/3 px-2">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                職員番号で検索
                            </label>
                            <input type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{ request('staff_number') ?? '' }}"
                                   name="staff_number"
                            >
                        </div>
                        <div class="w-1/3 px-2">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                日付で検索
                            </label>
                            <input type="text"
                                   id="datepicker"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{ request('date') ?? '' }}"
                                   name="date"
                            >
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn-primary">
                            検索する
                        </button>
                    </div>
                </form>
            </div>
        @endcomponent
    </div>

    <div class="px-4 mt-24 mx-auto w-full md:px-10" style="margin-top: 6rem">
        @component('admin::components.widgets.card')
            @slot('title')
                <span>
                    {{ $title }}
                </span>
            @endslot
            <p class="ml-4 text-sm">
            </p>
            <table class="items-center w-full border-collapse">
                <thead>
                <tr>
                    <th class="th-base">
                        予約ID
                    </th>
                    <th class="th-base">
                        予約日
                    </th>
                    <th class="th-base">
                        職員名
                    </th>
                    <th class="th-base">
                        メニュー内容
                    </th>
                    <th class="th-base">
                        メニュー価格
                    </th>
                    <th class="th-base">
                        ステータス
                    </th>
                    <th class="th-base"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($reservations as $reservation)
                    <tr>
                        <th class="td-base text-left flex items-center">
                            <a href="{{ route('admin.reservation.edit', ['reservation' => $reservation]) }}">
                                {{ $reservation->id }}
                            </a>
                        </th>
                        <td class="td-base">
                            <a href="{{ route('admin.reservation.edit', ['reservation' => $reservation]) }}">
                                {{ $reservation->date->format('Y年m月d日') }}
                            </a>
                        </td>
                        <td class="td-base">
                            <a href="{{ route('admin.reservation.edit', ['reservation' => $reservation]) }}">
                                {{ $reservation->user->name }}
                            </a>
                        </td>
                        <td class="td-base">
                            {{ $reservation->menu->main_dish ?? '' }}<br>
                            {{ $reservation->menu->side_dish1 ?? '' }}<br>
                            {{ $reservation->menu->side_dish2 ?? '' }}<br>
                            {{ $reservation->menu->side_dish3 ?? '' }}
                        </td>
                        <td class="td-base">
                            {{ number_format($reservation->price) }}円
                        </td>
                        <td class="td-base">
                            @if($reservation->is_cancelled)
                                <span
                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-blueGray-600 bg-blueGray-200 uppercase last:mr-0 mr-1">
                                    キャンセル済み
                                </span>
                            @else
                                <span
                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-lightBlue-600 bg-lightBlue-200 uppercase last:mr-0 mr-1">
                                    通常請求
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="5" class="td-base text-left flex items-center">
                            予約情報が存在していません。
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="p-4">
                {{ $reservations->links() }}
            </div>
        @endcomponent
    </div>
@endsection
