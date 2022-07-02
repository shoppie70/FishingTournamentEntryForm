<x-guest-layout>
    <x-auth-card>
        @include('front::auth.components.logo')

        <h1 class="mt-4 text-center mb-4">
            {{ $title }}
        </h1>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('登録したメールアドレスをお知らせいただければ、パスワード再設定用のリンクをメールでお送りします。新しいパスワードを設定してください。') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('user.password.email') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('メールアドレス')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autofocus/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('リセット用リンクの送信') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
