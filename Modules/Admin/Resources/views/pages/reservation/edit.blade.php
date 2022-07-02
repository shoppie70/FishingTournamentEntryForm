@extends('admin::layouts.master')

@section('script')
    <script>
        flatpickr("#datepicker", {
            locale: 'ja',
        });
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
                        <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-blueGray-400">
                            User Information
                        </h6>
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-1/3 px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => '予約ID',
                                    'name' => 'id',
                                    'value' => $reservation->id ?? '',
                                    'readonly' => true,
                                ])
                            </div>
                            <div class="w-1/3 px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => '予約職員',
                                    'name' => 'user',
                                    'value' => $reservation->user->name ?? '',
                                    'readonly' => true,
                                ])
                            </div>
                            <div class="w-1/3 px-2">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    予約日時
                                </label>
                                <input type="text"
                                       id="datepicker"
                                       class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                       value="{{ $reservation->date ?? '' }}"
                                       name="date"
                                >
                            </div>
                        </div>
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-1/3 px-2">
                                <label for="place" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    予約場所
                                </label>
                                <select name="place_id" id="place"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    @foreach( $reservation_places as $reservation_place )
                                        <option value="{{ $reservation_place->id }}" {{ $reservation_place->id === $reservation->place_id ? 'selected' : '' }}>
                                            {{ $reservation_place->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="mt-6 mb-4 border-b-1 border-blueGray-300">
                        <div class="flex justify-between items-center">
                            <div class="flex">
                                <div class="mr-6">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="hidden" name="is_cancelled" value="0">
                                        <input id="is_retired"
                                               name="is_cancelled"
                                               value="1"
                                               type="checkbox"
                                               class="form-checkbox border rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                                            {{ isset($reservation) && $reservation->is_cancelled ? 'checked' : '' }}
                                        >
                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                        キャンセル済み
                                    </span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn-primary">
                                保存する
                            </button>

                        </div>
                    </section>
                </form>
                @if(isset($reservation))
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
