<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Primary Meta Tags -->
        <meta name="title" content="前田杯 応募受付ページ">
        <meta name="description" content="岡山県は下津井の沖磯で行われる釣り大会です。お好きな魚種を2つまで選んで頂き、下部のフォームよりエントリーしてください。">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ route('index') }}">
        <meta property="og:title" content="前田杯 応募受付ページ">
        <meta property="og:description" content="岡山県は下津井の沖磯で行われる釣り大会です。お好きな魚種を2つまで選んで頂き、下部のフォームよりエントリーしてください。">
        <meta property="og:image" content="{{ asset('assets/front/images/ogp.png') }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:title" content="前田杯 応募受付ページ">
        <meta property="twitter:description" content="岡山県は下津井の沖磯で行われる釣り大会です。お好きな魚種を2つまで選んで頂き、下部のフォームよりエントリーしてください。">
        <meta property="twitter:image" content="{{ asset('assets/front/images/ogp.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
