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
</head>

<body>
    <div class="container">

        <a class="btn btn-link" href="/">index画面へ戻る</a>
        @auth
        <div class="container">
            <p class="h2">三択アプリ 解き直し画面</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><span class="mark">{{ Auth::user()->name }}</span> がログイン中</li>
                    <li class="breadcrumb-item active" aria-current="page">ユーザーid{{ Auth::user()->id }}</li>
                </ol>
            </nav>

        </div>
        @endauth

        @foreach($incorrectList as $incorrect)
        <div>

            <summary>
                <div class="collapse show" id="collapseExample" style="">
                    <div class="card card-body">
                        <p>(間違えた問題)　{{ $incorrect->question->question }}</p>
                        <p>(間違えた選択肢)　{{ $incorrect->question->answer }}</p>
                        <p>(選ぶべき選択肢)　{{ $incorrect->question->answer }}</p>
                        <p>(問題の解説)　{{ $incorrect->question->comment }}</p>
                        <p>(間違えた日付)　{{ $incorrect->created_at }}</p>

                    </div>
                </div>
        @endforeach


        </div>
</body>