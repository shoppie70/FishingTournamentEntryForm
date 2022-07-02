<x-guest-layout>
    <x-auth-card>
        @include('front::auth.components.logo')

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="{{ $method }}" action="{{ $endpoint }}">
            @csrf
            @method($method)
            <h1 class="mt-4 text-center mb-4">
                {{ config('app.name') }} - {{ $title }}
            </h1>
            <p class="text-sm mb-4">
                メールアドレスとパスワードを登録してください。
            </p>
            <div class="mb-4">
                <x-label for="name" :value="__('職員名')"/>
                <x-input id="name" class="block mt-1 w-full bg-gray-100" type="text" name="name"
                         value="{{ $user->name ?? old('name') }}" readonly></x-input>
            </div>
            <div class="mb-4">
                <x-label for="staff_number" :value="__('職員番号')"/>
                <x-input id="staff_number" class="block mt-1 w-full bg-gray-100" type="text" name="staff_number"
                         value="{{ $user->staff_number ?? old('staff_number') }}" readonly></x-input>
            </div>
            <div class="mb-4">
                <label for="department">
                    部署
                </label>
                <select name="department_id" id="department"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ isset($user->department_id) && $user->department_id === $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <x-label for="email" :value="__('メールアドレス')"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}"
                         required></x-input>
            </div>
            <div class="mb-4">
                <x-label for="password" :value="__('パスワード')"/>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                         value="{{ old('password') }}" required></x-input>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
