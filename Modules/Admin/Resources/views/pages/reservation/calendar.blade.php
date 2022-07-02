@extends('admin::layouts.master')

@section('content')
    <div class="px-4 -m-24 mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                <div class="flex justify-between items-center">
                    {{ $title }}
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
                </div>
            @endslot
            <div class="p-4">
                @include('admin::components.form.errors')
            </div>
            <div class="p-4">
                <table class="text-center w-full border border-collapse">
                    <thead class="calendar-head">
                    <tr class="calendar-row">
                        <th class="p-4 border">
                            <a href="?year={{ $calendars['prev_month']->format('Y') }}&month={{ $calendars['prev_month']->format('n') }}">
                                &laquo; {{ $calendars['prev_month']->format('n月')  }}
                            </a>
                        </th>
                        <th colspan="3" class="p-4 border">
                            {{ $year }}年{{ $month }}月
                        </th>
                        <th class="p-4 border">
                            <a href="?year={{ $calendars['next_month']->format('Y') }}&month={{ $calendars['next_month']->format('n') }}">
                                {{ $calendars['next_month']->format('n月')  }} &raquo;
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="calendar-row">
                        @foreach (['月', '火', '水', '木', '金'] as $dayOfWeek)
                            <th class="p-4 border">
                                {{ $dayOfWeek }}
                            </th>
                        @endforeach
                    </tr>
                    @foreach ( $calendars['calendar'] as $i => $calendar_data)
                        @php
                            $sum = 0;
                            $date_string = $calendar_data['date']->toDateString();
                            $is_rest = (isset($calendar_data['menu']['is_rest']) && ($calendar_data['menu']['is_rest']));
                        @endphp
                        @if ($calendar_data['date']->dayOfWeek === 6)
                            <tr>
                                @endif
                                <td class="border {{ $calendar_data['date']->isToday() ? 'bg-red-200' : '' }}">
                                    <h3 class="mb-4 p-4 {{ $calendar_data['date']->isToday() ? 'border-b' : 'bg-green-50' }}">
                                        {{ $calendar_data['date']->isoFormat('YYYY年MM月DD日(ddd)') }}
                                    </h3>
                                    <ul class="mb-4 px-2">
                                        @foreach($reservation_places as $reservation_place)
                                            @php
                                                $sum += $calendar_data['reserve'][$reservation_place->id] ?? 0;
                                            @endphp
                                            <li class="mb-2">
                                                {{ $reservation_place->name }}：<span class="font-bold">{{ $calendar_data['reserve'][$reservation_place->id] ?? 0 }}食</span>
                                            </li>
                                        @endforeach
                                        <li class="mb-2">
                                            合計：<span class="font-bold">{{ $sum ?? 0 }}食</span>
                                        </li>
                                    </ul>
                                </td>
                                @if ($calendar_data['date']->dayOfWeek === 5)
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endcomponent
    </div>
@endsection
