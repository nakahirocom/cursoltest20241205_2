# みんなでsantakuフォローアプリ

### 1.clone後にやること
sentakuディレクトリ移動後、ローカルで起動するために下記コードを入力下さい
```
docker-compose up -d
docker-compose exec app bash
```

コンテナの中に入ったら下記コードで必要なものをインストールすると使えるようになります。
```
yarn install
```

### 2.herokuの公開URL
https://aqueous-beyond-55660.herokuapp.com/
