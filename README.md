# 釣り大会エントリーフォームシステム

岡山県下津井のフィールドで開催される釣り大会「前田杯」の参加エントリー受付Webアプリケーションです。

---

## 🛠 技術スタック

- **PHP**: 8.3
- **Framework**: Laravel 12.x
- **Database**: MySQL 8.0
- **Development Environment**: Laravel Sail (Docker)
- **Modular Architecture**: `nwidart/laravel-modules` (Admin / Front 分割構成)
- **Frontend / Assets**: Laravel Mix / Tailwind CSS / Alpine.js
- **PDF Generation**: `barryvdh/laravel-dompdf`

---

## 🚀 開発環境の構築方法 (Laravel Sail)

Docker / Docker Desktop (または OrbStack) が動作する環境で、以下の手順に従って環境を起動します。

### 1. リポジトリのクローン & ディレクトリ移動

```bash
git clone git@github.com:shoppie70/FishingTournamentEntryForm.git
cd FishingTournamentEntryForm
```

### 2. 環境変数ファイルの準備

```bash
cp .env.example .env
```

### 3. Laravel Sail コンテナの起動

```bash
./vendor/bin/sail up -d
```

> **エイリアスの設定（推奨）**
> `alias sail='./vendor/bin/sail'` を ~/.zshrc や ~/.bashrc に設定すると `sail` コマンドで実行可能です。

### 4. アプリケーションキーの生成 & マイグレーション

```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
```

### 5. アセットのビルド & ローカル確認

```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

ブラウザで以下にアクセスして動作を確認できます：

- **Webサイト**: [http://localhost](http://localhost)
- **Mailpit (メール受信確認ダッシュボード)**: [http://localhost:8025](http://localhost:8025)

---

## 💡 主な操作コマンド

| コマンド                                 | 説明                                 |
| :--------------------------------------- | :----------------------------------- |
| `./vendor/bin/sail up -d`              | コンテナのバックグラウンド起動       |
| `./vendor/bin/sail stop`               | コンテナの停止                       |
| `./vendor/bin/sail artisan route:list` | ルート一覧の表示                     |
| `./vendor/bin/sail artisan migrate`    | データベースマイグレーションの実行   |
| `./vendor/bin/sail npm run dev`        | フロントエンドアセットの開発用ビルド |

---

## 📝 モジュール構成

本システムは `nwidart/laravel-modules` パッケージを採用しており、機能ごとにモジュール化されています。

- `Modules/Front`: 一般参加者向けエントリーフォームおよびビュー
- `Modules/Admin`: 大会管理者向け管理画面

---

## 🏛 静的アーカイブ（ポートフォリオ掲載・履歴用）

大会終了に伴い、応募ページの画面デザインをそのまま保存した静的HTMLアーカイブページを用意しています。PHP/Laravel環境がなくても直接ブラウザや GitHub Pages 等で閲覧可能です。

- **ルート静的ページ**: `index.html` (ローカルブラウザ直接閲覧用)
- **Public静的ページ**: `public/index.html` (Webサーバー/GitHub Pagesルート配信用)

