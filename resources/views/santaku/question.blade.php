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

<p>method-actionは</p>
<h1>viewのファイル名__question.blade.php[三択問題が出題される画面]</h1>
<p>-----------------------------------------------------------------------------------------</p>
<br />
<a class="btn" href="/">index画面へ戻る</a>
<p>-----------------------------------------------------------------------------------------</p>
<br />
<span>■問題:</span>
<br />
<div>
    <summary>
        <p>{{ $question->question }}</p>
    </summary>
</div>
<p>---------------------------------------------------------------- </p>
<br />
<span>■選択肢</span>

<form action="{{ route('answer.index') }}" method="post">
    @csrf
    <input type="hidden" name="question_id" value="{{ $question->id }}">
    <input type="hidden" name="questions" value="{{ $questions }}">

    <input type="hidden" name="shuffled0Id" value="{{ $shuffled0Id }}">
    <input type="hidden" name="shuffled1Id" value="{{ $shuffled1Id }}">
    <input type="hidden" name="shuffled2Id" value="{{ $shuffled2Id }}">
    @foreach($questions as $question)
        <label>
            <input type="radio" name="choice_id" value="{{ $question->id }}">
                {{ $question->answer }}
        </label>
        <br />
    @endforeach
    <input type="submit" value="回答する">
</form>

<br />

<section>
    <h2>▼▼▼▼▼※開発用の案内につきここから下は削除予定▼▼▼▼▼▼</h2>
    <ul>この画面からの移動先
        <li><a href="/">1.〇index画面へ /resources/views/santaku/index.blade.php</a></li>
        <li>2.✕問題と答えを新規作成画面へ /resources/views/santaku/new.blade.php</li>
        <li>3.✕あなたの三択設定画面へ /resources/views/santaku/santakuset.blade.php</li>
        <li><a href="/question">4.〇三択を解く画面へ /resources/views/santaku/question.blade.php</a></li>
        <li>5.✕自分が作成した問題を一覧表示する画面へ /resources/views/santaku/list.blade.php</li>
        <li>6.✕問題と答えを編集する画面へ /resources/views/santaku/edit.blade.php</li>
    </ul>
</section>

</body>
</html>
