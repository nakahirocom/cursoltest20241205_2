# みんなでsantakuフォローアプリ

### 1.clone後にローカル側で下記を入力すると使えるようになります。
sentakuディレクトリ移動後、dockerを起動しコンテナに入るために下記コードを入力
※mac環境の場合
```
docker-compose up -d
docker-compose exec app bash
```
※windows環境の場合、
```
docker-compose up -d
winpty docker-compose exec app bash
```

コンテナの中に入ったら下記コードで必要なものをインストールすると使えるようになります。
```
yarn install
```

### 2.herokuの公開URL
https://aqueous-beyond-55660.herokuapp.com/
