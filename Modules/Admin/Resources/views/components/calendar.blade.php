<div class="p-4">
<table class="text-center w-full border border-collapse">
    <thead class="calendar-head">
    <tr class="calendar-row">
        <th class="p-4 border">
            <a href="?year={{ $calendar_array['prev_reference_month']->format('Y') }}&month={{ $calendar_array['prev_reference_month']->format('m') }}">
                &laquo; 先月
            </a>
        </th>
        <th colspan="5" class="p-4 border">
            {{ $calendar_array['reference_date']->format('Y年m月') }}
        </th>
        <th class="p-4 border">
            <a href="?year={{ $calendar_array['next_reference_month']->format('Y') }}&month={{ $calendar_array['next_reference_month']->format('m') }}">
                来月 &raquo;
            </a>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr class="calendar-row">
        @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
            <th class="p-4 border">
                {{ $dayOfWeek }}
            </th>
        @endforeach
    </tr>
    @foreach ( $calendar_array['period'] as $day)
        @if ($day->dayOfWeek === 0)
            <tr>
                @endif
                @php
                    $date_selected_flg = $today_flg = false;

                    if( isset($date) && $date === $day->format('Y-m-d') ) {
                        $date_selected_flg = true;
                    }
                    if( $day->isToday() ){
                        $today_flg = true;
                    }
                @endphp
                <td class="p-4 border {{ $date_selected_flg ? 'bg-blue-400' : '' }} {{ $today_flg ? 'bg-blue-400' : '' }}">
                    <a class="{{ $date_selected_flg || $today_flg ? 'text-white' : 'text-gray' }}"
                       href="">
                        {{ $day->format('m月d日') }}
                    </a>
                </td>
                @if ($day->dayOfWeek === 6)
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
</div>
