@extends('admin::layouts.master')

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
                            <div class="w-full px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => '場所名',
                                    'name' => 'name',
                                    'value' => $place->name ?? '',
                                    'readonly' => true,
                                ])
                            </div>
                        </div>
                        <hr class="mt-6 mb-4 border-b-1 border-blueGray-300">
                        <div class="flex justify-between items-center">
                            <ul class="flex">
                                @foreach($departments as $department)
                                    <li class="mr-6">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="hidden" name="departments[{{ $department->id }}]" value="0">
                                            <input id="is_retired"
                                                   name="departments[{{ $department->id }}]"
                                                   value="1"
                                                   type="checkbox"
                                                   class="form-checkbox border rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                                                {{ isset($place) && in_array($department->id, array_column($place->department->toArray(), 'id'), true) ? 'checked' : '' }}
                                            >
                                            <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                {{ $department->name }}
                                            </span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
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
