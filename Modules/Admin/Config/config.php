<?php

return [
    'sidebar' => [
        'name' => 'Admin',
        'sidebar' => [
            [
                'id' => 'menus',
                'name' => '献立管理',
                'menus' => [
                    [
                        'uri' => '/admin/menu/calendar',
                        'title' => '献立カレンダー',
                    ],
                ],
            ],
            [
                'id' => 'reservation',
                'name' => '予約管理',
                'menus' => [
                    [
                        'uri' => '/admin/reservation',
                        'title' => '予約一覧',
                    ],
                    [
                        'uri' => '/admin/reservation/calendar',
                        'title' => '予約をカレンダーで確認する',
                    ],
                ],
            ],
            [
                'id' => 'staff',
                'name' => '職員管理',
                'menus' => [
                    [
                        'uri' => '/admin/user',
                        'title' => '職員一覧',
                    ],
                    [
                        'uri' => '/admin/user/create',
                        'title' => '職員の追加',
                    ],
                    [
                        'uri' => '/admin/user/bulk_update',
                        'title' => '職員一括登録',
                    ],
                    [
                        'uri' => '/admin/department',
                        'title' => '部署一覧',
                    ],
                    [
                        'uri' => '/api/admin/v1/reservation/export',
                        'title' => '利用状況CSVエクスポート',
                    ],
                ],
            ],
            [
                'id' => 'billing',
                'name' => '請求管理',
                'menus' => [
                    [
                        'uri' => '/admin/invoice',
                        'title' => '請求書一覧',
                    ],
                ],
            ],
            [
                'id' => 'system',
                'name' => 'システム管理',
                'menus' => [
                    [
                        'uri' => '/admin/accounts',
                        'title' => '管理者一覧',
                    ],
                    [
                        'uri' => '/admin/menu/price',
                        'title' => 'メニュー価格',
                    ],
                    [
                        'uri' => '/admin/reservation/place',
                        'title' => '予約場所',
                    ],
                    [
                        'uri' => '/admin/system/phpmyadmin',
                        'title' => 'PHP情報',
                    ],
                    [
                        'uri' => '/admin/system/artisan',
                        'title' => 'キャッシュ管理',
                    ],
                ],
            ],
        ],
    ],
];
