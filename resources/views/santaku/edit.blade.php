<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>santakuアプリ</title>
</head>

<body>
<p>method-actionは </p>
<h1>viewのファイル名_edit.blade.php [私が作成した問題の編集・削除画面]</h1>
<p>-----------------------------------------------------------------------------------------<br /><a class="btn" href="/">index画面へ戻る</a></p>
<p>-----------------------------------------------------------------------------------------</p>
@if (session('feedback.success'))
    <p style="color: green">{{ session('feedback.success') }}</p>
@endif

<form action="{{ route('update.put', ['santakuId' => $santaku->id])
 }}"method="post">■問題と回答を編集してください
@method('PUT')
@csrf
<br />
<span>問題:</span>
<br />
<textarea type="text" name="question" >
{{ $santaku->question }}</textarea>

<br />
<span>答え:</span>
<br />
<textarea type="text" name="answer" >
{{ $santaku->answer }}</textarea>

<br />
<span>解説:</span>
<br />
<textarea type="text" name="comment" >
{{ $santaku->comment }}</textarea>

<br />
<span>ジャンル:</span>
<br />
<select name="blood"><br />
        <option value="taxmaster">税理士</option>
        <option value="programer">プログラミング</option>
        <option value="rule">会社ルール</option>
        <option value="sonota">その他</option>
    </select><br />
    
    <button type="submit">編集したものを登録する</button>
    </form>
    <br />

<form action="{{ route('delete', ['santakuId' => $santaku->id])
 }}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit">この問題を削除する</button>
</form>

    <h1>▼▼▼▼▼※開発用の案内につきここから下は削除予定▼▼▼▼▼▼</h1>
<ul>この画面からの移動先<li><a href="/">1.✕index画面へ /resources/views/santaku/index.blade.php</a></li>
    <li>2.✕問題と答えを新規作成画面へ /resources/views/santaku/new.blade.php</li>
    <li>3.✕あなたの三択設定画面へ /resources/views/santaku/sentakuset.blade.php</li>
    <li>4.✕三択を解く画面へ /resources/views/santaku/question.blade.php</a></li>
    <li> <a href="/list">5.〇自分が作成した問題を一覧表示する画面へ /resources/views/santaku/list.blade.php</a></li>
    <li>6.✕問題と答えを編集する画面へ /resources/views/santaku/list.blade.php</li>
</ul>
</body>
</html>