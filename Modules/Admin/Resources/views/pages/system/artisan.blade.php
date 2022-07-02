@extends('admin::layouts.master')

@section('content')
    <div class="px-4 -m-24 mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                <div class="flex items-start justify-between">
                    {{ $title }}
                </div>
            @endslot

            @if($errors->any())
                <div class="mb-4 p-4 w-full">
                    @include('admin::components.form.errors')
                </div>
            @endif

            @if($success = session('success'))
                <div class="p-4">
                    @include('admin::components.form.success')
                </div>
            @endif

            @foreach($commands as $key => $command)
                <section class="border-b">
                    <form method="POST" action="{{ route('admin.system.artisan.run') }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="command" value="{{ $key }}">
                        <div class="px-8 py-4 flex justify-between items-center">
                            <p class="w-4/12">
                                {{ $command['name'] }}
                            </p>
                            <p class="w-6/12 py-2 px-4 bg-gray-100 tracking-wider text-sm text-gray-500 rounded-md">
                                $ {{ $command['command'] }}
                            </p>
                            <div class="w-2/12 px-4">
                                <button class="btn-primary" type="submit">
                                    実行
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            @endforeach
        @endcomponent
    </div>
@endsection
