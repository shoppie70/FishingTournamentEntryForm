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
                        <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-blueGray-400">
                            Admin Profile
                        </h6>
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-1/3 px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => '名称',
                                    'name' => 'name',
                                    'value' => $admin->name ?? '',
                                ])
                            </div>
                            <div class="w-1/3 px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => 'メールアドレス',
                                    'name' => 'email',
                                    'value' => $admin->email ?? ''
                                ])
                            </div>
                            <div class="w-1/3 px-2">
                                <label for="role"
                                       class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    権限
                                </label>
                                <select name="role" id="role"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                >
                                    @foreach($roles as $role_id => $role_name)
                                        <option value="{{ $role_id }}"
                                            {{ isset($admin, $admin->role) && $role_id === $admin->role ? 'selected' : '' }}
                                        >
                                            {{ $role_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="px-2 w-full">
                                @include('admin::components.form.input-text', [
                                    'label' => '新パスワード',
                                    'name' => 'password',
                                    'value' => '',
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
