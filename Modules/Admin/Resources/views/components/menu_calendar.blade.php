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
                $date_string = $calendar_data['date']->toDateString();
                $is_rest = (isset($calendar_data['menu']['is_rest']) && ($calendar_data['menu']['is_rest']));
            @endphp
            @if ($calendar_data['date']->dayOfWeek === 6)
                <tr>
                    @endif
                    <td class="border" x-data="{ checked{{ $i }}: {{ $is_rest ? 'true' : 'false' }} }"
                        :class="checked{{ $i }} ? 'bg-red-200' : ''">
                        <h3 class="mb-4 p-4 bg-green-50">
                            {{ $calendar_data['date']->isoFormat('YYYY年MM月DD日(ddd)') }}
                        </h3>
                        <div class="w-full text-left px-4 pb-4">
                            <div class="relative w-full mb-3">
                                <label for="main_dish{{ $i }}"
                                       class="input-label-base">
                                    主菜
                                </label>
                                <input type="text" id="main_dish{{ $i }}" name="menu[{{ $date_string }}][main_dish]"
                                       value="{{ $calendar_data['menu']['main_dish'] ?? '' }}"
                                       class="input-form-base">
                            </div>
                            <div class="relative w-full mb-3">
                                <label for="side_dish1_{{ $i }}"
                                       class="input-label-base">
                                    副菜1
                                </label>
                                <input type="text" id="side_dish1_{{ $i }}"
                                       name="menu[{{ $date_string }}][side_dish1]"
                                       value="{{ $calendar_data['menu']['side_dish1'] ?? '' }}"
                                       class="input-form-base">
                            </div>
                            <div class="relative w-full mb-3">
                                <label for="side_dish2_{{ $i }}"
                                       class="input-label-base">
                                    副菜2
                                </label>
                                <input type="text" id="side_dish2_{{ $i }}"
                                       name="menu[{{ $date_string }}][side_dish2]"
                                       value="{{ $calendar_data['menu']['side_dish2'] ?? '' }}"
                                       class="input-form-base">
                            </div>
                            <label class="flex items-center pl-4">
                                <input type="hidden" name="menu[{{ $date_string }}][is_rest]">
                                <input type="checkbox" x-model="checked{{ $i }}"
                                       name="menu[{{ $date_string }}][is_rest]"
                                       class="mr-2">
                                <span class="text-sm">
                                    休業日
                                </span>
                            </label>
                        </div>
                    </td>
                    @if ($calendar_data['date']->dayOfWeek === 5)
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
