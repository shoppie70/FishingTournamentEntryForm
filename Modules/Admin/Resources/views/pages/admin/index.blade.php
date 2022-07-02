@extends('admin::layouts.master')

@section('content')
    <div class="px-4 -m-24 mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                <div class="flex items-start justify-between">
                    <span>
                        {{ $title }}
                    </span>
                    @if(Auth::user()->role === 0)
                        <a class="btn-primary" href="{{ $route_for_create }}">
                            {{ $base_title }}の新規追加
                        </a>
                    @endif
                </div>
            @endslot
            <p class="ml-4 text-sm">
            </p>
            <table class="items-center w-full border-collapse">
                <thead>
                <tr>
                    <th class="th-base">
                        ID
                    </th>
                    <th class="th-base">
                        名前
                    </th>
                    <th class="th-base">
                        メールアドレス
                    </th>
                    <th class="th-base">
                        権限
                    </th>
                    <th class="th-base">

                    </th>
                    <th class="th-base">

                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($admin_accounts as $admin)
                    <tr>
                        <th class="td-base text-left flex items-center">
                            <a href="{{ route('admin.accounts.edit',['admin' => $admin]) }}">
                                {{ $admin->id }}
                            </a>
                        </th>
                        <td class="td-base">
                            <a href="{{ route('admin.accounts.edit',['admin' => $admin]) }}">
                                {{ $admin->name }}
                            </a>
                        </td>
                        <td class="td-base">
                            {{ $admin->email }}
                        </td>
                        <td class="td-base">
                            {{ Modules\Admin\Enums\AdminType::getDescription($admin->role) }}
                        </td>
                        <td class="td-base text-right">
                            <a href="{{ route('admin.accounts.edit',['admin' => $admin]) }}" class="btn-primary">
                                編集
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="5" class="td-base text-left flex items-center">
                            ユーザーが存在していません。
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        @endcomponent
    </div>
@endsection
