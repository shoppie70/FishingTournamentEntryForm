@if($errors->any())
    <div class="rounded bg-red-400 p-4 w-full">
        <h6 class="mb-2 text-white font-bold text-lg">
            エラーが発生しました。
        </h6>
        <ul class="text-white text-sm">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
