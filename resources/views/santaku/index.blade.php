<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>santakuアプリ</title>
</head>

<h2>※メルアド＋pw使った認証のための仮ログイン画面。リンク設定は未実装</h2>

<p>method-actionは </p>
<p>viewのファイル名_index.blade.php [タイトル画面]</p>
<p>-----------------------------------------------------------------------------------------</p>
<div>
<a class="btn" href="/question/questionId">三択を解く画面へ</a>
<br />
<a class="btn" href="/question/sentakuset">あなたの三択設定へ移動する</a>
<br />
<a class="btn" href="/question/new">問題作成画面へ移動する</a>
<br />
<a class="btn" href="/question/list">自分が作成した問題を一覧表示へ移動する</a>
<p>-----------------------------------------------------------------------------------------</p>
<h2>▼▼▼▼▼※開発用の案内につきここから下は削除予定▼▼▼▼▼▼</h2>
<ul>この画面からの移動先<li>1.✕index画面へ views/index.pug</li>
    <li> <a href="/question/new">2.〇問題と答えを新規作成画面へ views/new.pug</a></li>
    <li><a href="/question/sentakuset">3.〇あなたの三択設定画面へ views/sentakuset.pug</a></li>
    <li> <a href="/question/questionId">4.〇三択を解く画面へ views/question.pug</a></li>
    <li> <a href="/question/list">5.〇自分が作成した問題を一覧表示する画面へ views/list.pug</a></li>
    <li>6.✕問題と答えを編集する画面へ views/edit.pug</li>
</ul>