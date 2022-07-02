@extends('admin::layouts.master')

@section('script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
    <script>
        flatpickr("#month", {
            locale: 'ja',
            static: true,
            altInput: true,
            plugins: [new monthSelectPlugin({shorthand: false, dateFormat: "Y-m-d", altFormat: "Y年M"})]
        })
    </script>
@endsection

@section('content')
    <div class="px-4 -m-24 mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                {{ $title }}
            @endslot
            <div class="flex-auto px-4 py-10 pt-0">
                <form method="{{ $method }}" action="{{ $endpoint }}" class="api_form">
                    @csrf
                    <section>
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-1/3 px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => '請求年月',
                                    'name' => 'date',
                                    'id' => 'month',
                                    'value' => $invoice->date ?? date('Y-m-01'),
                                ])
                            </div>
                            <div class="w-1/3 px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => '提供数',
                                    'name' => 'serves',
                                    'value' => $invoice->serves ?? $total_serves
                                ])
                            </div>
                            <div class="w-1/3 px-2">
                                @include('admin::components.form.input-text', [
                                     'label' => '請求金額',
                                     'name' => 'billing_amount',
                                     'value' => $invoice->billing_amount ?? $total_billing_amount
                                 ])
                            </div>
                        </div>
                        <hr class="mt-6 mb-4 border-b-1 border-blueGray-300">
                        <div class="flex justify-end items-center">
                            <button type="submit" class="btn-primary">
                                保存する
                            </button>
                        </div>
                    </section>
                </form>
                @if(isset($invoice))
                    <form class="api_form" method="{{ $method }}" action="{{ $delete_endpoint }}">
                        @csrf
                        <div class="mt-2 text-right">
                            <button type="submit" class="btn-secondary">
                                削 除
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        @endcomponent
    </div>
@endsection
