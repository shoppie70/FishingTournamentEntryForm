<div class="flex flex-wrap mt-4">
    <div class="px-4 w-full">
        <div class="flex relative flex-col pt-4 mb-6 w-full min-w-0 break-words bg-white rounded shadow-lg">
            <div class="px-4 py-3 mb-0 rounded-t border-0">
                <h3 class="text-base font-semibold text-blueGray-700">
                    {{ $title }}
                </h3>
            </div>
            {{ $slot }}
        </div>
    </div>
</div>
