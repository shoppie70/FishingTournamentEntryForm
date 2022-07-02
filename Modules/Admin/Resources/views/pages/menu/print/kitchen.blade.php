@extends('admin::layouts.print')

@section('style')
    <style>
        .print_pages {
            width: 297mm;
            height: 420mm;
            page-break-after: always;
            margin: auto;
            background-color: white;
        }
        @page {
            size: A3
        }
        @media print {
            body {
                width: 297mm;
                height: 420mm;
            }
        }
    </style>
@endsection

@section('content')
    <div class="p-4 print_pages">
        <h1 class="text-center mb-4 text-lg font-bold">
            {{ $title }}
        </h1>
        <table class="text-center w-full table-fixed border border-collapse">
            <tr class="">
            @foreach ( $calendars['calendar'] as $i => $calendar_data)
                @if ($calendar_data['date']->dayOfWeek === 6)
                    <tr>
                        @endif
                        <td class="border border-black">
                            <div style="min-height: 300px;">
                                <h3 class="p-4 font-bold" style="background-color: #99CC00">
                                    {{ $calendar_data['date']->format('n') === $month ? $calendar_data['date']->isoFormat('MM月DD日(ddd)') : '　　　' }}
                                </h3>
                                <ul class="pt-1 px-2 text-sm">
                                    <li class="">
                                        {{ $calendar_data['menu']['main_dish'] ?? '' }}
                                    </li>
                                    <li class="">
                                        {{ $calendar_data['menu']['side_dish1'] ?? '' }}
                                    </li>
                                    <li class="">
                                        {{ $calendar_data['menu']['side_dish2'] ?? '' }}
                                    </li>
                                </ul>
                            </div>
                        </td>
                        @if ($calendar_data['date']->dayOfWeek === 5)
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection
