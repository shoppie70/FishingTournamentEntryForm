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
                        年月
                    </th>
                    <th class="th-base">
                        提供分
                    </th>
                    <th class="th-base">
                        請求金額
                    </th>
                    <th class="th-base">
                        <div class="text-right">
                            請求書PDF
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($invoices as $invoice)
                    <tr>
                        <th class="td-base text-left flex items-center">
                            <a href="{{ route('admin.invoice.edit', ['invoice' => $invoice]) }}">
                                {{ $invoice->date->format('Y年m月') }}
                            </a>
                        </th>
                        <td class="td-base">
                            <a href="{{ route('admin.invoice.edit', ['invoice' => $invoice]) }}">
                                {{ $invoice->serves }}食
                            </a>
                        </td>
                        <td class="td-base">
                            <a href="{{ route('admin.invoice.edit', ['invoice' => $invoice]) }}">
                                {{ number_format($invoice->billing_amount) }}円
                            </a>
                        </td>
                        <td class="td-base text-right">
                            <a target="_blank" rel="noopener" class="btn-primary" href="{{ route('admin.invoice.pdf', ['invoice' => $invoice]) }}">
                                請求書を出力する
                            </a>
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
            <div class="p-4">
                {{ $invoices->links() }}
            </div>
        @endcomponent
    </div>
@endsection
