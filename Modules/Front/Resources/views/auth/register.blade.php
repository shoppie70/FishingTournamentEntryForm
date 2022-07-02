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
                職員番号を入力して、初回登録手続きを行ってください。
            </p>
            <div class="mt-4">
                <x-label for="staff_number" :value="__('職員番号')"/>

                <x-input id="staff_number" class="block mt-1 w-full" type="text" name="staff_number" :value="old('staff_number')" required/>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('送信') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
