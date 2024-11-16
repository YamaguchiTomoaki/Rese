# Rese(飲食店予約アプリ)

## 機能概要
### 飲食店一覧ページ  
上部の検索ツールで地域やジャンル、店名を指定すると該当の店舗が表示されます。  
又、♡ボタンをクリックすることでお気に入り店舗の登録が行えます。  
![スクリーンショット 2024-11-16 004427](https://github.com/user-attachments/assets/0f27f6aa-b285-41cc-b754-6195b1f491ae)

### ナビゲーションページ
左上のReseアイコンをクリックすると表示されます。  
ユーザーの新規作成、ログイン、ログアウト、マイページへの遷移、店舗一覧ページへの遷移を行うことができます。  
#### 未ログイン時
![スクリーンショット 2024-11-16 013033](https://github.com/user-attachments/assets/46bf3158-af36-4105-936f-b694bdec03d7)
#### ログイン時
![スクリーンショット 2024-11-16 013238](https://github.com/user-attachments/assets/3c923bcb-463f-4079-a4c6-31cc0b402cc6)


### 店舗詳細ページ
店舗の詳細情報とレビューページへの遷移、予約を行うことができます。  
予約はログイン済みのユーザーのみ行うことが可能です。
![スクリーンショット 2024-11-16 005147](https://github.com/user-attachments/assets/ee0191fb-9f57-4d20-b6a3-73fe285602fb)
#### リマインダーメール
予約日の朝7時にリマインダーメールが送信されます。
![スクリーンショット 2024-11-16 142044](https://github.com/user-attachments/assets/220582f8-a358-4446-9817-237cdb417349)


### 新規作成ページ
ユーザー名、メールアドレス、パスワードを入力し、新規利用者ユーザーの作成を行います。
![スクリーンショット 2024-11-16 014624](https://github.com/user-attachments/assets/a74a23ed-1dca-4368-8491-933b64392f32)

### メール認証待ちページ
新規ユーザーの作成を行うと遷移される画面です。  
認証メールが送信されていない場合は再送ボタンをクリックすると認証メールが再送されます。
![スクリーンショット 2024-11-16 014640](https://github.com/user-attachments/assets/0773d4be-5a45-4cc0-81f1-4fa04837c17a)

### メール認証
送信された「メールアドレスを確認してください」ボタンをクリックするとログイン済みの状態で飲食店一覧ページに遷移します。
![スクリーンショット 2024-11-16 014659](https://github.com/user-attachments/assets/38a95522-02f1-4587-a8a1-da5acd594b6d)


### マイページ
予約情報とお気に入り店舗が表示されます。  
予約変更、予約取り消し、事前決済、QRコードを表示して来店確認を行うことができます。
![スクリーンショット 2024-11-16 005458](https://github.com/user-attachments/assets/6eb2a0c8-0d17-4bdb-b790-49acfbcd2b77)

### 予約変更ページ
予約変更を行うことができます。
![スクリーンショット 2024-11-16 005915](https://github.com/user-attachments/assets/298ae6ec-bdb7-4065-be14-8fc9a9f61460)

### 事前決済
カード番号などを入力することで事前決済が行えます。  
単価3000円×人数で値段が決定される仕様になっています。
![スクリーンショット 2024-11-16 010049](https://github.com/user-attachments/assets/df3e6fc2-3897-49a5-b970-1691fa591614)

### QRコード
QRコードを読み込むことで来店済みフラグが変化します。
![スクリーンショット 2024-11-16 010326](https://github.com/user-attachments/assets/723d2524-cc4c-4eb3-aa31-64586aad882a)

### レビューページ
5段階評価でレビューを送信できます。  
コメントは未入力でもレビューを送信することができます。
![スクリーンショット 2024-11-16 010441](https://github.com/user-attachments/assets/3d1433df-3f5f-4989-a374-da8b350a47e6)

### 管理者ページ
店舗責任者の作成とお知らせメールの送信をすることができます。
![スクリーンショット 2024-11-16 010825](https://github.com/user-attachments/assets/3165e82e-7749-49f5-a5db-a5284fe780e5)

### 店舗責任者作成ページ
ユーザーネーム、メールアドレス、パスワードを設定し、店舗責任者の作成を行います。
![スクリーンショット 2024-11-16 010959](https://github.com/user-attachments/assets/689e23a6-af8b-465d-b3c4-2efe90679594)

### 利用者お知らせメール作成ページ
件名と本文を入力し、利用者権限の全ユーザーにお知らせメールを送信することができます。
![スクリーンショット 2024-11-16 011204](https://github.com/user-attachments/assets/0a1cdba8-0d95-4e26-aefa-19e52596a5e6)

### 店舗責任者ページ
店舗情報の作成、編集、予約一覧の確認を行うことができます。
![スクリーンショット 2024-11-16 011347](https://github.com/user-attachments/assets/19467161-d0ec-4c84-aa90-54c2c862fe66)

### 店舗情報の作成ページ
店名、地域、ジャンル、店舗概要、店舗画像を入力し、店舗の作成を行います。  
店舗の作成を行った店舗責任者ユーザーがその店舗の責任者になります。  
一人の店舗責任者が複数の店舗の責任者になることは可能です。
![スクリーンショット 2024-11-16 011520](https://github.com/user-attachments/assets/e1d6eebd-5dde-486c-b03f-a9519e2b5bad)

### 店舗情報の編集(店舗一覧)
ログインしている店舗責任者が責任者となっている店舗を全て表示します。  
店舗情報の編集を行う店名をクリックすると店舗情報の編集ページに遷移します。
![スクリーンショット 2024-11-16 012021](https://github.com/user-attachments/assets/3094bc80-8a8f-4f30-bc53-68602c868501)

### 店舗情報の編集ページ
店舗情報の編集を行います。  
店舗画像以外は変更前の値がデフォルトで設定されています。 
店舗画像のみ未設定時は既存の店舗画像が設定されます。
![スクリーンショット 2024-11-16 012239](https://github.com/user-attachments/assets/69b2511e-b5d5-40e8-91c5-f579f9422e28)

### 予約一覧(店舗一覧)
ログインしている店舗責任者が責任者となっている店舗を全て表示します。  
店名をクリックすると予約一覧ページに遷移します。
![スクリーンショット 2024-11-16 012541](https://github.com/user-attachments/assets/fc3ff907-58c3-4b79-926d-56071b7c7470)

### 予約一覧ページ
店舗の予約情報を全て表示します。  
日付、時間、予約名、人数、来店状態、支払い状態を確認することができます。
![スクリーンショット 2024-11-16 012709](https://github.com/user-attachments/assets/427d7206-1f99-458d-86ee-9ed1a32f3a6d)

## 作成した目的
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。

## 環境構築
### Dockerビルド

　1. `git clone git@github.com:YamaguchiTomoaki/Rese.git`  
　2. DockerDesktopアプリを立ち上げる  
　3. `docker compose up -d --build`  
　*MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください  

 ### Laravel環境構築

　1. `docker compose exec php bash`  
　2. `composer install`  
　3. 「.env.example」ファイルを「.env」ファイルに命名を変更。又は、新しく「.env」ファイルを作成  
　4. 「.env」ファイルに以下の環境変数を追加  

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel_db
    DB_USERNAME=laravel_user
    DB_PASSWORD=laravel_pass  

    MAIL_HOST=mail  

    STRIPE_PUBLIC_KEY=pk_test_51PynoNArnwtide5IJsCGJF8TDeGl3LXADSp8TmglZ05vApv9DYjEKEyjxxgAuNqoauK2n36onGrEyT4H3xj6m4WK00SEyEWIj3  
    STRIPE_SECRET_KEY=sk_test_51PynoNArnwtide5IFUtjQxzTXFlVmLJ1wohv1hHMZDbzOzwTw4Bjv6wPjv5gQYUfKEGDaYvnHww3c2cgYXUHxSJV00Qa19haTL  
    
　5. アプリケーションキーの作成
 
    php artisan key:generate

  6. マイグレーションの実行

    php artisan migrate

  7. シーディングの実行

    php artisan db:seed

　※上記を全て実行してもサイトにアクセスできない場合  
　　storageディレクトリの書き込み権限を変更  
    
    sudo chmod -R 777 src/storage/

## 作成済みのユーザー

### 管理者ユーザー
#### メールアドレス：admin@gmail.com
#### パスワード：admin_test1

### 店舗責任者ユーザー
#### ユーザー1
#### メールアドレス：representative@gmail.com
#### パスワード：shop_representative1

#### ユーザー2
#### メールアドレス：representative2@gmail.com
#### パスワード：shop_representative2

#### ユーザー3
#### メールアドレス：representative3@gmail.com
#### パスワード：shop_representative3


## 使用技術(実行環境)
* PHP 8.2.25
* Laravel 10.48.22
* MySQL 8.0.26

## テーブル設計
![スクリーンショット 2024-11-15 215744](https://github.com/user-attachments/assets/83b48e69-1a90-4959-962a-b9a4ca9720fa)
![スクリーンショット 2024-11-15 215800](https://github.com/user-attachments/assets/981793ac-c4d6-4571-958e-f356b7374dc3)
![スクリーンショット 2024-11-15 215810](https://github.com/user-attachments/assets/5c80f43d-853d-4c52-b8a6-c28e0b7bfd98)


## ER図
![スクリーンショット 2024-11-16 144226](https://github.com/user-attachments/assets/aadd1f7f-ff3b-42d8-a333-17f1fe48fe4b)

## URL
* 開発環境：http://localhost/
* phpMyAdmin：http://localhost:8080/
* Mailpit：http://localhost:8025/
* 本番環境：http://13.114.27.230/
