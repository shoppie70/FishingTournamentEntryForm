@extends('admin::layouts.master')

@section('content')
    <div class="px-4 -m-24 mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                <div class="flex items-start justify-between">
                    {{ $title }}
                </div>
            @endslot
            <p class="ml-4 text-sm">
                {{ phpinfo() }}
            </p>
        @endcomponent
    </div>
@endsection
