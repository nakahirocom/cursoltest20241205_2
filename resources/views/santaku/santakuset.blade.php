<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>santakuアプリ</title>
</head>

<p>method-actionは</p>
<h1>viewのファイル名_sentakuset.blade.php [あなた向けの問題を設定する画面]</h1>
<p>-----------------------------------------------------------------------------------------</p>
<br />
<a class="btn" href="/">index画面へ戻る</a>
<p>-----------------------------------------------------------------------------------------</p>
<form method="get" action="/question">■この設定で問題をとく<br />
<span>選択数:</span>
<br />
<input type="radio" name="選択肢" value="2" />
<span>2択</span>
<input type="radio" name="選択肢" value="3" />
<span>3択</span>
<input type="radio" name="選択肢" value="4" />
<span>4択</span>
<br />
<br />
<span>選択ジャンル:</span>
<br />
<input type="checkbox" name="ジャンル" value="javascript" />
<span>javascript</span>
<input type="checkbox" name="ジャンル" value="node.js" />
<span>node.js</span>
<input type="checkbox" name="ジャンル" value="taxmaster" />
<span>税理士</span>
<input type="checkbox" name="ジャンル" value="boki" />
<span>簿記</span>
<br />
<br />
<button type="submit">選択問題をとく</button>
</form>
<h2>▼▼▼▼▼※開発用の案内につきここから下は削除予定▼▼▼▼▼▼</h2>
<ul>この画面からの移動先<li> <a href="/">1.〇index画面へ /resources/views/Santaku/index.blade.php</a></li>
    <li>2.✕問題と答えを新規作成画面へ /resources/views/Santaku/new.blade.php</li>
    <li>3.✕あなたの三択設定画面へ /resources/views/santaku/Santakuset.blade.php</li>
    <li> <a href="/question">4.〇三択を解く画面へ /resources/views/santaku/question.blade.php</a></li>
    <li>5.✕自分が作成した問題を一覧表示する画面へ /resources/views/santaku/list.blade.php</li>
    <li>6.✕問題と答えを編集する画面へ /resources/views/santaku/edit.blade.php</li>
</ul>