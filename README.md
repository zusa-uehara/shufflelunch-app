# Part 8：フルスクラッチでWebアプリケーション

## 目的

* フルスクラッチでアプリケーションを作成する
* Webアプリケーションの仕組みの理解を深める

---

## 環境構築

```bash
# Docker イメージのビルド
docker-compose build

# Docker コンテナの起動
docker-compose up -d

# Docker コンテナ内でコマンドを実行する
docker-compose exec app php -v

# Docker コンテナの停止・削除
docker-compose down

環境構築 (Remote Development 編)

Docker イメージをビルドします。

docker-compose build


VSCode の「Remote-Containers: Open Folder in Container」からコンテナを開きます。
コマンドは VSCode のターミナルで実行してください。

終了するときは下記コマンドでコンテナを停止・削除します。

docker-compose down

デバッグ（Xdebug）

コードにブレークポイントを設定

デバッグビューを開く

「Listen for Xdebug」を選択してデバッグを開始

アプリを実行

※ .vscode/launch.json の port が 9003 になっているか確認してください。

静的解析

※ Remote Development で開発している場合は、VSCodeのターミナルで実行してください。

## PHPStan でコードのバグを検知する
composer phpstan

## PHP_CodeSniffer でコーディング規約に準拠していないコードを検知する
composer phpcs

```

# Shuffle Lunch Service – MVC構造のPHP自作Webアプリ

このアプリは、独学エンジニアという学習サイトの課題として作成した
「社員同士のランチをランダムにマッチングする Web アプリケーション」です。
フレームワークを使わず、素のPHPのみでMVC構造を構築して実装しました。

※ 課題提出用のため、Application.php に記載している DB接続情報 はそのままアップしています。
クローンして使用する場合はご自身の環境にあわせて書き換えお願いします。

## 学習目的
| 目的                                             |
| ---------------------------------------------- |
| PHPを用いたWebアプリケーションの全体的な作り方を理解する                |
| フレームワークを使わずにMVC構造を自作できるようになる                   |
| 将来的にフレームワークを利用する際に、仕組みを理解した上で使えるようにする |


## ディレクトリ構成

```
application.php
bootstrap.php

controller
├── EditController.php
├── EmployeeController.php
└── ShuffleController.php

views
├── edit/index.php
├── employee/index.php
├── shuffle/index.php
└── layout.php

core
├── Autoloader.php
├── Controller.php
├── DatabaseManager.php
├── DatabaseModel.php
├── HttpNotFoundException.php
├── Request.php
├── Response.php
├── Router.php
└── View.php

models
└── Employee.php

web
├── index.php
└── .htaccess

```

## 機能一覧
| フェーズ     | 機能                    |
| -------- | --------------------- |
| 初期実装     | ・社員名の登録<br>・シャッフル一覧表示 |
| 追加実装     | ・社員番号の登録<br>・社員名の編集   |
| リファクタリング | ・一からMVC構造でアプリを再構築     |


## 技術構成
| 項目  | 内容                     |
| --- | ---------------------- |
| 言語  | PHP（素のPHP）             |
| 構造  | オリジナルMVC               |
| DB  | MySQL（mysqli）          |
| その他 | .htaccessを利用したルーティング制御 |


## 最後に
ご質問や改善点に関するご提案がございましたら、GitHubのIssuesを通じてご連絡いただけますと幸いです。
