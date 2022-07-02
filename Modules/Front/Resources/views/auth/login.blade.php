<x-guest-layout>
    <x-auth-card>
    @include('front::auth.components.logo')

    <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('user.login') }}">
            @csrf
            <h1 class="mt-4 text-center mb-4">
                {{ config('app.name') }}
            </h1>

            <!-- Email Address -->
            <div>
                <x-label for="staff_number" :value="__('職員番号')"/>

                <x-input id="staff_number" class="block mt-1 w-full" type="text" name="staff_number"
                         :value="old('staff_number')" required
                         autofocus/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="current-password"/>
            </div>

            <!-- Remember Me -->
{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="inline-flex items-center">--}}
{{--                    <input id="remember_me" type="checkbox"--}}
{{--                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"--}}
{{--                           name="remember">--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

            <div class="flex items-center justify-between mt-4">
                <div>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('user.password.request') }}">
                        {{ __('パスワードを忘れた方はこちら') }}
                    </a><br>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('user.register') }}">
                        {{ __('初回ログイン時はこちら') }}
                    </a>
                </div>

                <x-button class="ml-3">
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
