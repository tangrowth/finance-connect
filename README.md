# Finance Connect


## 作成した目的
![APP Top](https://github.com/tangrowth/finance-connect/assets/101622404/fdd17c38-950a-48fe-a93c-d3e4808b1af9)
ベネッセのUser-Based Digital Competitionにて作成しました。
金融の知識を手軽に得ることが出来るようにし、また自分の手法を投稿しいいねをもらうことでモチベーションの維持につなげることが目的です。
## 機能一覧
- 認証機能
  - ログイン機能
  - ログアウト機能
  - 会員登録機能
- ユーザー関連の機能
  - 属性設定機能
  - 金融手段設定機能
  - ユーザー情報更新機能
  - ユーザーの目標金額と達成金額の比較機能
- 投稿関連機能
  - 投稿の作成
  - 投稿の検索
  - 投稿から自分の目標金額達成までの期間の表示
- お気に入り機能
  - 投稿のお気に入り
  - お気に入り一覧の表示
  - 投稿へのお気に入り数の表示機能
- その他の機能
  - おすすめの金融手段診断機能
  - 診断結果から難易度・投稿日から投稿の取得

## 使用技術（実行環境）
- PHP 8.2.4
- Laravel 10.10
- Docker 20.10.21
- MySQL
- NGINX

## ER図
![ER drawio](https://github.com/tangrowth/finance-connect/assets/101622404/a3e0ba47-84e3-450d-b87f-c02637780f1b)

## 他に記載することがあれば記述する
### 環境構築方法
1. ターミナルで以下のコマンドを実行する
```
$ git clone https://github.com/tangrowth/finance-connect.git
```
2. finance-connect/src/.env.exampleファイルをコピーし、finance-connect/src/.envファイルを作成する。
3. .envファイルの中身を以下のように変更する
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
4. finance-connectディレクトリで以下のコマンドを実行し、Dockerでコンテナを作成する。
```
$ docker-compose up -d --build
```
5. 以下のコマンドを実行し、データベースの作成とプロジェクトの起動を行う
```
$ docker-compose exec php bash
$ composer update
$ php artisan migrate
$ php artisan db:seed
$ php artisan key:generate
$ php artisan storage:link
```
6. 以下のリンクにアクセスするとページが表示される
http://localhost/
表示されない場合は、finance-connectディレクトリで以下のコマンドを実行してください。
```
$ sudo chmod -R 777 *
```
