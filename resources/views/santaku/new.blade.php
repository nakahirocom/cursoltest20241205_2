<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>santakuアプリ</title>
</head>

<p>method-actionは
<p>viewのファイル名は_new.blade.php [問題と答えの新規作成画面]</p>
<p>-----------------------------------------------------------------------------------------<br />
<a class="btn" href="/">index画面へ戻る</a></p>
<p>-----------------------------------------------------------------------------------------</p>
<form method="post" action="{{ route('create.index') }}">■問題と回答を登録してください
@csrf
<br />
<span>問題:</span>
<br />
<input type="text" name="question" />
<br />
<span>答え:</span>
<br />
<input type="text" name="answer" />
<br /><span>解説:</span>
<br />
<input type="text" name="explanation" />
<br />
<br />
<span>ジャンル:</span><br /><select name="blood"><br />
        <option value="taxmaster">税理士</option>
        <option value="programer">プログラミング</option>
        <option value="rule">会社ルール</option>
        <option value="sonota">その他</option>
    </select><br /><button type="submit">問題をDBへ新規登録しインデックス画面へ戻る</button></form>
    <h2>▼▼▼▼▼※開発用の案内につきここから下は削除予定▼▼▼▼▼▼</h2>
    <ul>この画面からの移動先
      <li><a href="/">1.〇index画面へ /resources/views/santaku/index.blade.php</a></li>
      <li>2.✕問題と答えを新規作成画面へ /resources/views/santaku/new.blade.php</li>
      <li>3.✕あなたの三択設定画面へ /resources/views/santaku/santakuset.blade.php</li>
      <li>4.✕三択を解く画面へ /resources/views/santaku/question.blade.php</a></li>
      <li>5.✕自分が作成した問題を一覧表示する画面へ /resources/views/santaku/list.blade.php</li>
      <li>6.✕問題と答えを編集する画面へ /resources/views/santaku/edit.blade.php</li>
    </ul>
</p>