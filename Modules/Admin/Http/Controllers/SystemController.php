<?php

namespace Modules\Admin\Http\Controllers;

use function array_key_exists;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\Rule;

class SystemController extends Controller
{
    protected array $commands = [
        'optimize:clear' => [
            'command' => 'php artisan optimize:clear',
            'name' => 'すべてのキャッシュの削除',
            'messages' => [
                'success' => 'すべてのキャッシュを削除しました。',
                'failed' => 'キャッシュの削除に失敗しました。',
            ],
        ],
        'clear-compiled' => [
            'command' => 'php artisan clear-compiled',
            'name' => 'コンパイルクラスファイルの削除',
            'messages' => [
                'success' => 'コンパイルクラスファイルを削除しました。',
                'failed' => 'コンパイルクラスファイルの削除に失敗しました。',
            ],
        ],
        'cache:clear' => [
            'command' => 'php artisan cache:clear',
            'name' => '設定ファイルのキャッシュの削除',
            'messages' => [
                'success' => 'キャッシュを削除しました。',
                'failed' => 'キャッシュの削除に失敗しました。',
            ],
        ],
        'config:clear' => [
            'command' => 'php artisan config:clear',
            'name' => 'コンフィグキャッシュの削除',
            'messages' => [
                'success' => 'コンフィグのキャッシュを削除しました。',
                'failed' => 'コンフィグのキャッシュの削除に失敗しました。',
            ],
        ],
        'route:clear' => [
            'command' => 'php artisan route:clear',
            'name' => 'ルートキャッシュの削除',
            'messages' => [
                'success' => 'ルートキャッシュを削除しました。',
                'failed' => 'ルートキャッシュの削除に失敗しました。',
            ],
        ],
        'view:clear' => [
            'command' => 'php artisan view:clear',
            'name' => 'Viewキャッシュの削除',
            'messages' => [
                'success' => 'Viewキャッシュを削除しました。',
                'failed' => 'Viewキャッシュの削除に失敗しました。',
            ],
        ],
        'opcache:clear' => [
            'command' => 'php artisan opcache:clear',
            'name' => 'OPcacheのリセット',
            'messages' => [
                'success' => 'OPcacheのリセットしました。',
                'failed' => 'OPcacheのリセットに失敗しました。',
            ],
        ],
        'debugbar:clear' => [
            'command' => 'php artisan debugbar:clear',
            'name' => 'Laravel Debugbarのキャッシュの削除',
            'messages' => [
                'success' => 'Laravel Debugbarのキャッシュを削除しました。',
                'failed' => 'Laravel Debugbarのキャッシュの削除に失敗しました。',
            ],
        ],
        'permission:cache-reset' => [
            'command' => 'php artisan permission:cache-reset',
            'name' => 'ロールと権限のキャッシュの削除',
            'messages' => [
                'success' => 'ロールと権限のキャッシュを削除しました。',
                'failed' => 'ロールと権限のキャッシュの削除に失敗しました。',
            ],
        ],
        'media-library:clean' => [
            'command' => 'php artisan media-library:clean',
            'name' => 'メディア関連の不要ファイルの削除',
            'messages' => [
                'success' => 'メディア関連の不要ファイルを削除しました。',
                'failed' => 'メディア関連の不要ファイルの削除に失敗しました。',
            ],
        ],
        'media-library:regenerate' => [
            'command' => 'php artisan media-library:regenerate',
            'name' => 'サムネイル画像などの再生成',
            'messages' => [
                'success' => 'サムネイル画像などの再生成しました。',
                'failed' => 'サムネイル画像などの再生成に失敗しました。',
            ],
        ],
    ];

    public function phpmyadmin()
    {
        $title = 'PHP情報';

        return view('admin::pages.system.phpmyadmin', compact(
            'title',
        ));
    }

    public function artisan()
    {
        $title = 'キャッシュ管理';

        $artisanCommands = Artisan::all();

        $commands = array_filter(
            $this->commands,
            static function ($k) use ($artisanCommands) {
                return array_key_exists($k, $artisanCommands);
            },
            ARRAY_FILTER_USE_KEY,
        );

        return view('admin::pages.system.artisan', compact(
            'title',
            'commands'
        ));
    }

    public function run(Request $request)
    {
        $allowedCommands = array_keys($this->commands);

        $request->validate([
            'command' => [
                'required',
                Rule::in($allowedCommands),
            ],
        ]);

        $command = $request->command;

        try {
            $isCommandSuccess = Artisan::call($command) === 0;
        } catch (Exception|Error $e) {
            return redirect()->back()->withErrors([
                'command' => $e->getMessage(),
            ]);
        }

        if (! $isCommandSuccess) {
            return redirect()->back()->withErrors([
                'command' => $this->commands[$command]['messages']['failed'],
            ]);
        }

        return redirect()->back()->with('success', $this->commands[$command]['messages']['success']);
    }
}
