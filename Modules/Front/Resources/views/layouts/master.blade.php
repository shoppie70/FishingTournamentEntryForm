<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>

        @include('front::partials.style')

    </head>
    <body class="bg-cyan-100 min-h-screen w-full mx-auto" style="max-width: 540px">
{{--        <header class="pt-4 mb-4">--}}
{{--            @include('front::partials.header')--}}
{{--        </header>--}}
        <main class="">
            @yield('content')
        </main>
        <footer>
{{--            @include('front::partials.footer')--}}
        </footer>

        @include('front::partials.script')
    </body>
</html>
