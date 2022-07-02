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
                        職員番号
                    </th>
                    <th class="th-base">
                        職員名
                    </th>
                    <th class="th-base">
                        部署名
                    </th>
                    <th class="th-base">
                        ステータス
                    </th>
                    <th class="th-base">
                        今月の利用回数
                    </th>
                    <th class="th-base">
                        今月の利用料金
                    </th>
                    <th class="th-base"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <th class="td-base text-left flex items-center">
                            <a href="{{ route('admin.user.edit',['user' => $user]) }}">
                                {{ $user->staff_number }}
                            </a>
                        </th>
                        <td class="td-base">
                            <a href="{{ route('admin.user.edit',['user' => $user]) }}">
                                {{ $user->name }}
                            </a>
                        </td>
                        <td class="td-base">
                            {{ $user->department->name ?? '' }}
                        </td>
                        <td class="td-base">
                            @if($user->is_temporary)
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-emerald-600 bg-emerald-200 uppercase last:mr-0 mr-1">
                                    仮会員
                                </span>
                            @endif
                            @if($user->is_retired)
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-blueGray-600 bg-blueGray-200 uppercase last:mr-0 mr-1">
                                  退職済み
                                </span>
                            @endif
                            @if(!($user->is_temporary || $user->is_retired))
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-lightBlue-600 bg-lightBlue-200 uppercase last:mr-0 mr-1">
                                  利用職員
                                </span>
                            @endif
                        </td>
                        <td class="td-base">
                            {{ $user->getUsageMountByMonth(date('n')) }}回
                        </td>
                        <td class="td-base">
                            {{ number_format($user->getUsageMoneyByMonth(date('n'))) }}円
                        </td>
                        <td class="td-base text-right">
                            <a href="#pablo" class="text-blueGray-500 block py-1 px-3"
                               onclick="openDropdown(event,'table-light-1-dropdown')">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div
                                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                                id="table-light-1-dropdown">
                                <a href="{{ route('admin.user.edit',['user' => $user]) }}"
                                   class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                    ユーザ情報の編集
                                </a>
                            </div>
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
            <div class="p-4">
                {{ $users->links() }}
            </div>
        @endcomponent
    </div>
@endsection
