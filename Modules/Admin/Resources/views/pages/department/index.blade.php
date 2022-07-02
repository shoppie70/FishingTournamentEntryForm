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
                        部署ID
                    </th>
                    <th class="th-base">
                        部署名
                    </th>
                    <th class="th-base">
                        所属人数
                    </th>
                    <th class="th-base">

                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($departments as $department)
                    <tr>
                        <th class="td-base text-left flex items-center">
                            <a href="{{ route('admin.department.edit', ['department' => $department]) }}">
                                {{ $department->id }}
                            </a>
                        </th>
                        <td class="td-base">
                            <a href="{{ route('admin.department.edit', ['department' => $department]) }}">
                                {{ $department->name }}
                            </a>
                        </td>
                        <td class="td-base">
                            {{ $department->user->count() }}人
                        </td>
                        <td class="td-base text-right">
                            <a href="{{ route('admin.department.edit', ['department' => $department]) }}" class="btn-primary">
                                編集
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="td-base text-left flex items-center" colspan="5">
                            {{ $base_title }}が存在していません。
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        @endcomponent
    </div>
@endsection
