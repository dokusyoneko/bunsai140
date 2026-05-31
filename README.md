

# 140字小説 文彩

## サービス概要
- サービス名: 140字小説 文彩  
- サイト概要: 140字小説の投稿サイト
- 主な機能: 140字小説の投稿、 ユーザ認証( Fortify)、いいね機能、下書きの保存
- 対応ブラウザ: Chrome / Firefox / Safari 最新版  

## 環境構築
Docker ビルド  
git clone https://github.com/dokusyoneko/flea-market.git  
docker-compose up -d --build  
(※ MySQL が起動しない場合は、各PCの環境に合わせて docker-compose.yml を編集してください。)  
docker-compose exec php bash  
composer install  
composer require stripe/stripe-php  
cp .env.example .env  
(※環境変数を編集)  
php artisan key:generate  
php artisan migrate  
php artisan db:seed  
php artisan storage:link  

### 権限設定について
クローン後は `storage` と `bootstrap/cache` に書き込み権限を設定してください。   


## 使用技術
- 言語: PHP 8.1.33  
- フレームワーク: Laravel 8.83.29  
- データベース: MySQL 8.0.26  
- バージョン管理: GitHub  
- コンテナ環境: Docker 28.3.2  
- Webサーバー: Nginx 1.21.1
- メール送信テスト: Mailhog  
- 決済機能: Stripe (各自でテストキーを導入してください)

## ER図:\\wsl.localhost\Ubuntu\home\dokusyoneko\laravel\bunsai140\src\index_drawio.png
