

# 140字小説 文彩

## サービス概要
- サービス名: 140字小説 文彩  
- サイト概要: 140字小説の投稿サイト  
  140文字以内で物語を投稿できる140字小説投稿サイトです。  
  「物語は世界に彩を与える」をテーマにしているため、ベースは落ち着いた色合いでサイトを作成していますが、なにかアクションを起こした際(小説の投稿やいいねをした時)にサイトが色づくように設計しています。  
- 主な機能: 140字小説の投稿、 ユーザ認証( Fortify)、いいね機能、下書きの保存
- 対応ブラウザ: Chrome / Firefox / Safari 最新版  

## 環境構築
Docker ビルド  
git clone https://github.com/dokusyoneko/bunsai140.git  
docker-compose up -d --build  
(※ MySQL が起動しない場合は、各PCの環境に合わせて docker-compose.yml を編集してください。)  
docker-compose exec php bash  
composer install  
cp .env.example .env  
(※環境変数を編集)  
php artisan key:generate  
php artisan migrate  
php artisan db:seed  
php artisan storage:link  


### 権限設定について
クローン後は `storage` と `bootstrap/cache` に書き込み権限を設定してください。   


## 使用技術
- 言語: PHP 8.1.34  
- フレームワーク: Laravel 8.83.29  
- データベース: MySQL 8.0.26  
- バージョン管理: GitHub  
- コンテナ環境: Docker 28.3.2  
- Webサーバー: Nginx 1.21.1

## 使用技術  
- 一般ユーザー  
  メールアドレス：test@example.com  
  パスワード：password  
- 管理者ユーザー  
  メールアドレス：admin@example.com  
  パスワード：password  

## ER図  
<img width="692" height="612" alt="index_drawio" src="https://github.com/user-attachments/assets/e87d68dd-ca38-4027-9a52-4eb449ab6f6c" />



