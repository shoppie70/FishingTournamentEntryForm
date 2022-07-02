<x-guest-layout>
    <x-auth-card>
        @include('front::auth.components.logo')

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('user.password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="pt-4">
                <x-label for="email" :value="__('メールアドレス')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                         :value="old('email', $request->email)" required autofocus readonly/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('新しいパスワード')"/>

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('新しいパスワード（確認用）')"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('パスワードをリセットする') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
