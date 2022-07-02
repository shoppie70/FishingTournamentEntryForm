@extends('admin::layouts.master')

@section('content')
    <div class="px-4 -m-24 mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                {{ $title }}
            @endslot
            <div class="flex-auto px-4 py-10 pt-0 mt-8">
                <form method="{{ $method }}" action="{{ $endpoint }}" class="api_form">
                    @csrf
                    <section>
                        <div class="flex flex-wrap mb-4 w-full">
                            <div class="px-2 w-full">
                                @include('admin::components.form.input-text', [
                                    'label' => 'メニュー価格',
                                    'name' => 'price',
                                    'id' => 'price',
                                    'value' => $menu_price ?? 0,
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
            </div>
        @endcomponent
    </div>
@endsection
