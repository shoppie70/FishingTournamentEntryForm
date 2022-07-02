<html lang="ja">
<head>
    <title>
        {{ $title }}
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        @font-face {
            font-family: noto;
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/NotoSansJP-Regular.otf')}}") format('truetype');
        }

        @font-face {
            font-family: noto;
            font-style: bold;
            font-weight: bold;
            src: url("{{ storage_path('fonts/NotoSansJP-Bold.otf')}}") format('truetype');
        }

        body {
            font-family: noto, sans-serif;
        }
    </style>
</head>
<body>

<article>
    <header>
        <h1 style="text-align: center">
            請 　求　 書
        </h1>
        <p style="text-align:right">
            <span style="border-bottom: 1px solid #000">
                No. {{ $invoice->id }}
            </span><br>
            作成日：{{$invoice->created_at->format('Y年n月d日') }}
        </p>
        <p>
            倉敷平成病院　御中
        </p>
        <p style="text-align:right; margin-bottom: 2rem;">
            SGクリエイト株式会社<br>
            カフェ＆レストラン　スマイルキッチン<br>
            代表取締役　　岡本　大輔
        </p>
    </header>
    <main style="height: 400px;">
        <p>
            下記の通り、御請求申し上げます。金額は消費税込みとなっております。<br>
            職員定食代&emsp;&emsp;{{ $invoice->date->format('Y年n月') }}分&emsp;&emsp;<span style="font-weight: bold;">{{ $invoice->serves }}</span>食分
        </p>
        <table style="width: 100%; border: 2px solid #000; border-collapse: collapse">
            <tr>
                <th class="border-right: 2px solid #000; text-align: center;">
                    ご請求額
                </th>
                <td class="text-align: center;">
                    ¥{{ number_format($invoice->billing_amount) }}
                </td>
            </tr>
        </table>
    </main>
    <footer>
        <p>
            SGクリエイト株式会社<br>
            〒710-0834 倉敷市笹沖435-7<br>
            Tel：086-486-1598<br>
            Fax：086-486-1506
        </p>
        <table>
            <tr>
                <th>
                    振込銀行：
                </th>
                <td>
                    水島信用金庫　笹沖支店　普通0239794<br>
                    SGクリエイト㈱代表取締役　岡本大輔
                </td>
            </tr>
        </table>
    </footer>
</article>

</body>
</html>
