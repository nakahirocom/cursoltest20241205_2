<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>santakuアプリ</title>
</head>


<p>method-actionは </p>
<p>viewのファイル名_list.blade.php [私が作った問題を一覧表示する]</p>
<p>-----------------------------------------------------------------------------------------
  <br />
  <a class="btn" href="/">index画面へ戻る</a></p>
<p>-----------------------------------------------------------------------------------------</p>
<form method="get" action="/edit">
  <br />
  <span>■作成日時:</span>
  <input type="text" name="name" />
  <br />
  <span>■問題</span>
  <input type="text" name="1" />
  <br />
  <span>■答え</span>
  <input type="text" name="2" />
  <br />
  <span>■解説</span>
  <input type="text" name="3" />
  <br />
  <button type="submit">問題を編集する</button></form>

  <p>▼▼▼▼▼※開発用の案内につきここから下は削除予定▼▼▼▼▼▼</p>
<ul>この画面からの移動先<li><a href="/">1.〇index画面へ /resources/views/santaku/index.blade.php</a></li>
    <li>2.✕問題と答えを新規作成画面へ /resources/views/santaku/new.blade.php</li>
    <li>3.✕あなたの三択設定画面へ /resources/views/santaku/sentakuset.blade.php</li>
    <li>4.✕三択を解く画面へ /resources/views/santaku/question.blade.php</a></li>
    <li>5.✕自分が作成した問題を一覧表示する画面へ /resources/views/santaku/list.blade.php</li>
    <li> <a href="/edit">〇6.問題と答えを編集する画面へ /resources/views/santaku/edit.blade.php</a></li>
</ul>