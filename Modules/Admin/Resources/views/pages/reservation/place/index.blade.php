@extends('admin::layouts.master')

@section('content')
    <div class="px-4 -m-24 mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                <div class="flex items-start justify-between">
                    <span>
                        {{ $title }}
                    </span>
                    <a class="btn-primary" href="{{ $route_for_create }}">
                        {{ $base_title }}の新規追加
                    </a>
                </div>
            @endslot
            <p class="ml-4 text-sm">
            </p>
            <table class="items-center w-full border-collapse">
                <thead>
                <tr>
                    <th class="th-base">
                        場所ID
                    </th>
                    <th class="th-base">
                        場所名
                    </th>
                    <th class="th-base">
                        対応部署名
                    </th>
                    <th class="th-base"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($places as $place)
                    <tr>
                        <th class="td-base text-left flex items-center">
                            <a href="{{ route('admin.reservation.place.edit',['place' => $place]) }}">
                                {{ $place->id }}
                            </a>
                        </th>
                        <td class="td-base">
                            <a href="{{ route('admin.reservation.place.edit',['place' => $place]) }}">
                                {{ $place->name }}
                            </a>
                        </td>
                        <td class="td-base">
                            <ul>
                                @foreach($place->department as $department)
                                    <li class="mb-1">
                                        {{ $department->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="5" class="td-base text-left flex items-center">
                            {{ $base_title }}が存在していません。
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        @endcomponent
    </div>
@endsection
