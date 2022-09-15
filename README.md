# みんなで sentaku フォローアプリ

heroku の公開 URL: https://aqueous-beyond-55660.herokuapp.com/

## 開発環境構築手順

こちらは clone 直後の初回のみで OK です。(数分かかる)

```
docker run --rm -v "$(pwd)":/opt -w /opt laravelsail/php81-composer:latest composer install
```

設定ファイルを作成

```
cp .env.example .env
```

サーバーを起動してみる。(数分かかる)

```
./vendor/bin/sail up
```

ある程度コンソールが落ち着いてきたら(流れなくなったら)、アプリケーションの鍵を設定

```
./vendor/bin/sail artisan key:generate
```

その後 http://localhost にアクセスする。  
なにか画面が表示できれば OK。

## 開発方法

初回のセットアップが完了したら、基本的には以下の流れで開発を進めます。

### 開発環境を立ち上げる

開発が終わったら Ctrl+C で開発環境を終了する。

```
./vendor/bin/sail up
```

### 開発ルール

- main および develop への直接コミットは控えましょう
- 作業を開始する際は main からブランチを切って作業を行いましょう
- フォーマットおよびリントを適宜行い、コードの品質を保ちましょう
  - レビューコストの削減にも繋がります
- 非 ASCII なファイル名は控えましょう

### フォーマットおよびリントの実行

フォーマット

```sh
./vendor/bin/sail pint -vv
```

リント

```sh
./vendor/bin/phpstan analyse
```
