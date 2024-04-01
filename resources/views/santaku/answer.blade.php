<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>santakuアプリ</title>
    <!-- ここにCSSを追加 -->
    <style>
        img {
            max-width: 100%;
            height: auto;
        }

        @media screen and (max-width: 600px) {
            img {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a class="btn btn-link" href="/">HOME画面へ戻る</a>
        <a class="btn btn-link" href="/question">次の問題へ</a>

        @auth

        @endauth

        <p class="h2">三択アプリ　答え合わせ</p>


        <p>-------------------------------------------------------</p>


        </p>
        </span>

        <span class="placeholder col-12 placeholder-xs"></span>
        <br />

        @for ($i = 0; $i < count($viewModels); $i++) @if ($viewModels[$i]->isCorrect() )
            <span class="btn btn-outline-primary">■選択肢{{ $i + 1 }}：{{ "正解" }}</span>
            @else
            <span class="btn btn-outline-danger">■選択肢{{ $i + 1 }}：{{ "不正解" }}</span>
            @endif

            <div class="d-inline p-2 bd-highlight">あなたの正解率：{{ $uidseikairituModels[$i] }}% /累計回答数：{{
                $uidkaitousuuModels[$i] }}</div>
            <div class="d-sm-inline p-2 bd-highlight">みんなの正解率：{{ $allseikairituModels[$i] }}% /累計回答数：{{
                $allkaitousuuModels[$i] }}</div>
            <div class="collapse show" id="collapseExample" style="">
                <div class="card card-body">
                    @if ($viewModels[$i]->isCorrect() )
                    <p>問題：{{ $viewModels[$i]->getQuestion() }}</p>
                    @if($viewModels[$i]->getQuestion_path())
                    <img src="{{ $viewModels[$i]->getQuestion_path() }}" alt="Question Image">
                    @endif
                    <p>正答：{{ $viewModels[$i]->getAnswer() }}</p>
                    <p>解説：{{ $viewModels[$i]->getComment() }}</p>
                    <a href="{{ $viewModels[$i]->getComment() }}">解説link</a>
            

                    @if($viewModels[$i]->getComment_path())
                    <img src="{{ $viewModels[$i]->getComment_path() }}" alt="Comment Image">
                    @endif

                    @else
                    <p>出題問題：{{ $viewModels[$i]->getQuestion() }}</p>
                    <p>誤答：{{ $viewModels[$i]->getmissAnswer() }}</p>
                    <p>正答：{{ $viewModels[$i]->getAnswer() }}</p>
                    <p>正答解説：{{ $viewModels[$i]->getComment() }}</p>
                    <a href="{{ $viewModels[$i]->getComment() }}">正答link</a>

           
                    <br>
                    <p>誤答問題：{{ $viewModels[$i]->getmissQuestion() }}</p>
                    <p>誤答解説：{{ $viewModels[$i]->getmissComment() }}</p>
                    <a href="{{ $viewModels[$i]->getmissComment() }}">誤答link</a>

            
                    @endif


                </div>
            </div>
            <br>

            @endfor
            <a class="btn btn-link" href="/">HOME画面へ戻る</a>
            <a class="btn btn-link" href="/question">次の問題へ</a>

    </div>
</body>

</html>