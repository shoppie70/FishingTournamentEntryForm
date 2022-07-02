<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#000000"/>

    @include('admin::partials.style')
    <style>
        body {
            background-color: #aaa;
            -webkit-print-color-adjust: exact;
        }

        .print_pages:last-child {
            page-break-after: auto;
        }

        #print {
            background-color: #da6d6d;
            color: white;
            padding: 0.75rem 1.5rem;
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            font-size: 1.5rem;
            border-radius: 5px;
            font-weight: bold;
        }

        @media print {
            body {
                background-color: #fff !important;
            }
            .no-print {
                display: none;
            }
        }
    </style>

    <title>{{ $title ? $title . ' | ' . config('app.name') : config('app.name') }}</title>

</head>
<body class="">
    @yield('content')
    <button id="print" class="no-print">
        印刷する
    </button>
    <script>
        document.querySelector('#print').addEventListener('click', () => {
            window.print();
        });
    </script>
</body>
</html>
