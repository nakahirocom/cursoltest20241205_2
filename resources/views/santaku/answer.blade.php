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
<h1>viewのファイル名__answer.blade.php[三択問題の答え合わせ画面]</h1>
<p>-----------------------------------------------------------------------------------------</p>
<br />
<a class="btn" href="/">index画面へ戻る</a>
<p>-----------------------------------------------------------------------------------------</p>

<span>■問題:</span>
<summary>
        <p>{{ $questioned->question }}</p>
    </summary>

<span>■あなたの選択</span>
<br />
<summary>
        {{ $choiced->answer }}
        ：
        @if ($isCorrect)
            正解
        @else
            不正解
        @endif
<p>---------------------------------------------------------------- </p>
<br />
@for ($i = 0; $i < count($viewModels); $i++)
        @if ($viewModels[$i]->isCorrect() ) 
        <span>■選択肢{{ $i + 1 }}:{{ "正解" }}</span> 
        @else
        <span>■選択肢{{ $i + 1 }}:{{ "不正解" }}</span> 
        @endif 
        
    <summary>
        <p>問題：{{ $viewModels[$i]->getQuestion() }}</p>
    </summary>
    <summary>
        <p>答え：{{ $viewModels[$i]->getAnswer() }}</p>
    </summary>
    <summary>
        <p>解説：{{ $viewModels[$i]->getComment() }}</p>
    </summary>

@endfor

<a class="btn" href="/question">次の問題へ</a>
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
