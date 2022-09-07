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
    <a class="btn" href="/">index画面へ戻る</a>
    <a class="btn" href="/question">次の問題へ</a>
    <p>-----------------------------------------------------------------------------------------</p>
    <h2>三択アプリ　答え合わせ画面</h2>
    <p>-----------------------------------------------------------------------------------------</p>
    <span>■問題:</span>
    <summary>
        <p>{{ $questioned->question }}</p>
    </summary>

    <span>■あなたの選択</span>
    <br />
    <summary>
        {{ $choiced->answer }}

        @if ($isCorrect)
        ：正解
        @else
        ：不正解
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


</body>

</html>