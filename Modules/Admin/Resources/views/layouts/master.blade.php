<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#000000"/>
    <meta name="robots" content="noindex, nofollow">

    @include('admin::partials.style')

    <title>{{ $title ? $title . ' | ' . config('app.name') : config('app.name') }}</title>

</head>
<body>
<noscript>You need to enable JavaScript to run this app.</noscript>

<div id="root">
    @include('admin::partials.sidebar')
    <div id="main-content" class="relative min-h-screen md:ml-64 bg-blueGray-50">
        @include('admin::components.global_nav')
        @include('admin::partials.header')
        @yield('content')
    </div>
    {{--    @include('admin::partials.footer')--}}
</div>
@include('admin::partials.script')
</body>
</html>
