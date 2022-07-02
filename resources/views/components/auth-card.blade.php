<div class="min-h-screen flex flex-col justify-center items-center px-4 pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full">
        <div class="text-center">
            {{ $logo }}
        </div>

        <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>
