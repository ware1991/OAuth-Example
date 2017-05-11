Laravel 登入／註冊：使用 laravel/socialite

base on Laravel 5.4

專案配置
* 將專案 clone 下來後，至專案目錄底下執行底下命令:
    composer install
    composer update
* 新增檔案: .env 並寫入專案相關配置,資料庫等
* 新增 Table: php artisan migrate
* 設定 .env 的 application key: php artisan key:generate

練習筆記
* https://ware1991.gitbooks.io/laravel_login/content/

使用 API
* Facebook Developer API
https://developers.facebook.com

* Google Developer API 
https://console.developers.google.com

* Twitter Developer API
https://dev.twitter.com/rest/public

* Github Developer API
https://developer.github.com/v3/

建立 GitHub Application 的網址：https://github.com/settings/applications/new

建立 Twitter Application 的網址：https://apps.twitter.com/

參考網站： 
* https://scotch.io/tutorials/laravel-social-authentication-with-socialite 
* https://blog.damirmiladinov.com/laravel/laravel-5.2-socialite-facebook-login.html#.WP19ZFOGOi4
