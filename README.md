# Rese(飲食店予約アプリ)

## 作成した目的
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。

## 機能一覧
* 会員登録機能
* ログイン機能
* ログイン機能
* マイページ機能
* お気に入り店舗登録機能
* お気に入り店舗削除機能
* 飲食店詳細機能
* 飲食店予約登録機能
* 飲食店予約削除機能
* 飲食店検索機能
* 飲食店予約変更機能
* 飲食店評価機能
* 予約リマインダーメール機能
* 来店QRコード表示機能
* 事前決済機能
* 管理者機能
* 店舗責任者作成機能
* 利用者お知らせメール機能
* 店舗責任者機能
* 店舗情報の作成機能
* 店舗情報の更新機能
* 予約一覧の確認機能
* バリデーション機能
* レスポンシブデザイン機能(ブレイクポイント768px)
### 2025/1/24 Pro試験追加
---------------------------------------------------
* 口コミ機能
* 口コミ編集機能
* 口コミ削除機能
* 店舗一覧ソート機能
* csvインポート機能
---------------------------------------------------

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

### 2025/1/24 Pro試験追加
---------------------------------------------------
### 店舗詳細ページ(口コミ機能追加部分)
店舗詳細画面の左下部のボタンから口コミページに遷移します。  
全ての口コミ情報ボタンを押下すると口コミ一覧ページに遷移します。  
![スクリーンショット 2025-01-24 220740](https://github.com/user-attachments/assets/55f3bb1b-1d1d-4eaf-8468-a6a4ba064b49)
既にログインユーザーが口コミをしている場合は下記の画面になります。  
口コミを編集ボタンで口コミ編集ページへ遷移し、口コミを削除でログインユーザーの口コミを削除することができます。  
![スクリーンショット 2025-01-24 220926](https://github.com/user-attachments/assets/3ea1c34b-4505-4abb-8db5-f0bc123c3ad8)

### 口コミページ
5段階評価でレビューを送信できます。  
コメントと画像は未入力でもレビューを送信することができます。  
画像はjpg又はpngのみ添付可能です。  
![スクリーンショット 2025-01-24 221119](https://github.com/user-attachments/assets/62f57f32-9b4f-4050-aa06-5518ec5e9624)

### 口コミ編集ページ
登録済みの口コミの情報を表示します。  
入力方法は口コミページと同様です。  
![スクリーンショット 2025-01-24 221329](https://github.com/user-attachments/assets/8bcc1a59-7234-46de-ba1e-36460ca62603)

### 口コミ一覧ページ
店舗詳細ページで表示した店舗の口コミ一覧を表示します。  
画像が添付されていない口コミは画像無しで表示されます。  
![スクリーンショット 2025-01-24 221633](https://github.com/user-attachments/assets/b147bcfb-d5de-4c7e-b4f5-8f1c790bd017)

### 管理者ページ(口コミ削除機能追加部分)
口コミの削除ボタンより店舗一覧を表示し、その店舗を押下すると管理者用の口コミ一覧ページを表示します。
![スクリーンショット 2025-01-24 222102](https://github.com/user-attachments/assets/d6b8d1e5-f237-4bbb-965b-55f40fa14feb)
![スクリーンショット 2025-01-24 222109](https://github.com/user-attachments/assets/b646f3f9-2f44-4034-8c39-f74b4caefc0a)
管理者ユーザーは全てのユーザーの口コミを削除することができます。
![スクリーンショット 2025-01-24 222116](https://github.com/user-attachments/assets/cfb8c05a-8b8d-4ab2-aca3-6859d2dab56a)

### 飲食店一覧ページ(店舗一覧ソート機能部分)
検索ツールの左隣にあるセレクトボックスでソートを行うことができます。  
ランダム、評価が高い順、評価が低い順の3種類のソートが行えます。  
評価が高い順、評価が低い順のソートで評価無しのものは最後尾に表示されます。  
![スクリーンショット 2025-01-24 222447](https://github.com/user-attachments/assets/6406e5b4-cefd-4789-b2db-ae0eeb3198be)
![スクリーンショット 2025-01-24 222455](https://github.com/user-attachments/assets/36fea136-0a5f-4143-899d-c19bd4d4bc7c)
![スクリーンショット 2025-01-24 222502](https://github.com/user-attachments/assets/92314c12-fac5-478a-9f12-0280fada6312)
![スクリーンショット 2025-01-24 222509](https://github.com/user-attachments/assets/c64ff879-e251-46dd-9741-18240619cad2)

### 店舗責任者ページ(csvインポート機能追加部分)
csvから店舗作成ボタンを押下するとcsvインポートページに遷移します。
![スクリーンショット 2025-01-24 222947](https://github.com/user-attachments/assets/16688f4c-8d10-46ae-8995-46ed51df7353)

### csvインポートページ
店舗情報が記入されたcsvを添付するとログインしている店舗責任者で店舗を作成することができます。  
![スクリーンショット 2025-01-24 222955](https://github.com/user-attachments/assets/b910e820-3745-4aec-9127-bdfa310ebe79)
csvの記入例は下記になります。  
左から店舗名,地域,ジャンル,店舗概要,店舗画像URLで入力をお願いいたします。  
店舗名：50文字以内  
地域：「東京都」「大阪府」「福岡県」のいずれか  
ジャンル：「寿司」「焼肉」「イタリアン」「居酒屋」「ラーメン」のいずれか  
店舗概要：400文字以内  
画像URL：ファイル名のみ記述してください(jpeg、pngのみ)  
※画像URLに設定した画像ファイルがstorage/app/publicに無い場合は店舗画像無しで店舗一覧等に表示されます。  
　店舗情報の編集より画像添付をお願いいたします。  
ヘッダー部分の文字列一致は行っていないので下記キャプチャの文言のままでなくても可能ですが  
ヘッダー飛ばし処理がある為、1行分の記入をお願いいたします。  
1行目からデータ又は空欄の場合は1行分飛ばして店舗情報が作成される為、1店舗分の情報が反映されません。
![スクリーンショット 2025-01-24 220022](https://github.com/user-attachments/assets/166d14a6-e113-4a09-b52c-21c480b5747f)
バリデーションチェックを通過し、正常に店舗情報が作成されると下記キャプチャのように表示されます。  
![スクリーンショット 2025-01-24 224725](https://github.com/user-attachments/assets/99650260-19c0-4874-9ceb-f5f320cb9268)

---------------------------------------------------

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
### 2025/1/24 Pro試験追加
![スクリーンショット 2025-01-24 210655](https://github.com/user-attachments/assets/3e20ee06-1df7-4254-ac53-16a361e4925e)


## ER図
![スクリーンショット 2024-11-16 144226](https://github.com/user-attachments/assets/aadd1f7f-ff3b-42d8-a333-17f1fe48fe4b)
### 2025/1/24 Pro試験追加  
![スクリーンショット 2025-01-24 210343](https://github.com/user-attachments/assets/b29650be-0818-4cc1-9003-73b4f06dd362)



## URL
* 開発環境：http://localhost/
* phpMyAdmin：http://localhost:8080/
* Mailpit：http://localhost:8025/
* 本番環境：http://13.231.81.170/
