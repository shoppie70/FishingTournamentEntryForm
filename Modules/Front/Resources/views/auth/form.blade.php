<x-guest-layout>
    <x-auth-card>
    @include('front::auth.components.logo')

    <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="mt-4 text-center mb-4">
                {{ config('app.name') }}
            </h1>

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('お名前')"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required
                         autofocus/>
            </div>

            <input type="hidden" name="name" value="{{ $name }}">

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('メールアドレス')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation">

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
