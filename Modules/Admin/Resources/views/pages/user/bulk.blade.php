@extends('admin::layouts.master')

@section('script')
    <script>
        const fileInput = document.getElementById('file_upload');
        const handleFileSelect = () => {
            const files = fileInput.files;
            document.getElementById('file_message').innerText = fileInput.files[0].name;
            document.getElementById('upload_label').style.backgroundColor = '#d8ffda';
        }
        fileInput.addEventListener('change', handleFileSelect);
    </script>
@endsection

@section('content')
    <div class="px-4 -m-24 mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                {{ $title }}
            @endslot
            <p class="ml-4 mb-8 text-sm">
                CSVを用いて、職員を一括登録することが可能です。<br>
                CSVのフォーマットファイルは<a class="underline" href="{{ asset('assets/admin/csv/一括登録テンプレート.csv') }}">コチラ</a>からダウンロード可能ですので、こちらをご利用の上、アップロードお願いします。
            </p>
            <div class="flex-auto px-4 py-10 pt-0">
                <form method="{{ $method }}" action="{{ $endpoint }}" class="api_form">
                    @csrf
                    <section>
                        <div class="flex flex-wrap justify-center w-full mb-4">
                            <div class="flex justify-center">
                                <div class="flex w-full items-center justify-center bg-grey-lighter">
                                    <label
                                        id="upload_label"
                                        class="w-96 flex flex-col items-center px-4 py-6 bg-white text-green-500 rounded-lg shadow-lg tracking-wide uppercase border border-green-500 cursor-pointer hover:bg-green-500 hover:text-white">
                                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>
                                        </svg>
                                        <span id="file_message" class="mt-2 text-base leading-normal">
                                            CSVをアップロードしてください
                                        </span>
                                        <input type='file' id="file_upload" name="csv" class="hidden" accept=".csv" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-6 mb-4 border-b-1 border-blueGray-300">
                        <div class="flex justify-end items-center">
                            <button type="submit" class="btn-primary">
                                職員の一括登録処理を行う
                            </button>
                        </div>
                    </section>
                </form>
            </div>
        @endcomponent
    </div>
@endsection
