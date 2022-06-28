# みんなで sentaku フォローアプリ

heroku の公開 URL: https://aqueous-beyond-55660.herokuapp.com/

## 開発環境構築手順

こちらは clone 直後の初回のみで OK です。(数分かかる)

```
docker run --rm -v "$(pwd)":/opt -w /opt laravelsail/php81-composer:latest composer install
```

サーバーを起動してみる。(数分かかる)

```
./vendor/bin/sail up
```

ある程度コンソールが落ち着いてきたら(流れなくなったら)、 http://localhost にアクセスする。  
なにか画面が表示できれば OK。

## 開発方法

初回のセットアップが完了したら、基本的には以下の流れで開発を進めます。

### 開発環境を立ち上げる

開発が終わったら Ctrl+C で開発環境を終了する。

```
./vendor/bin/sail up
```
