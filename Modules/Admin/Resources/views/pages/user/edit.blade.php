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
                            User Information
                        </h6>
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-1/3 px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => '職員番号',
                                    'name' => 'staff_number',
                                    'value' => $user->staff_number ?? '',
                                    'readonly' => isset($user),
                                ])
                            </div>
                            <div class="w-1/3 px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => '職員名',
                                    'name' => 'name',
                                    'value' => $user->name ?? ''
                                ])
                            </div>
                            <div class="w-1/3 px-2">
                                <label for="department_id"
                                       class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    部署名
                                </label>
                                <select name="department_id" id="department_id"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                >
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ isset($user, $user->department) && $department->id === $user->department->id ? 'selected' : '' }}
                                        >
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-wrap w-full">
                            <div class="w-full px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => 'メールアドレス',
                                    'name' => 'email',
                                    'value' => $user->email ?? '',
                                    'placeholder' => '新規追加時はメールアドレスを空にしてください。',
                                    'readonly' => !isset($user),
                                    'class' => 'w-full'
                                ])
                            </div>
                        </div>
                        <hr class="mt-6 mb-4 border-b-1 border-blueGray-300">
                        <div class="flex justify-between items-center">
                            <div class="flex">
                                <div class="mr-6">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="hidden" name="is_retired" value="0">
                                        <input id="is_retired"
                                               name="is_retired"
                                               value="1"
                                               type="checkbox"
                                               class="form-checkbox border rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                                            {{ isset($user) && $user->is_retired ? 'checked' : '' }}
                                        >
                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                        退職済み
                                    </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="hidden" name="is_temporary" value="0">
                                        <input id="is_temporary"
                                               name="is_temporary"
                                               value="1"
                                               type="checkbox"
                                               class="form-checkbox border rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                                            {{ (isset($user) && $user->is_temporary) || !isset($user) ? 'checked' : '' }}
                                        >
                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                        仮会員
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
            </div>
        @endcomponent
    </div>
@endsection
