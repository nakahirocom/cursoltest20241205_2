# みんなで sentaku フォローアプリ

heroku の公開 URL: https://aqueous-beyond-55660.herokuapp.com/

## 開発環境構築手順

こちらは clone 直後の初回のみで OK です。

※ MacOS の場合

```
docker-compose up -d
docker-compose exec app bash
```

※ Windows 環境の場合

```
docker-compose up -d
winpty docker-compose exec app bash
```

コンテナの中に入ったら下記コードで必要なものをインストールすると使えるようになります。

```
yarn install
```

## 開発方法

### コンテナの中に入る

※ MacOS の場合

```
docker-compose up -d
docker-compose exec app bash
```

※ Windows 環境の場合

```
docker-compose up -d
winpty docker-compose exec app bash
```

### Express を起動

```
yarn start
```

これでサーバーが立ち上がるので、 http://localhost:8000 にアクセスすることができます。
