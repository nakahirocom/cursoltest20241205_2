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
        <button type="button" onClick="history.back()">前の画面に戻る</button>

        @auth
        <p class="h3">三択アプリ　ひたすら問題を解きまくりモード</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span class="mark">{{ Auth::user()->name }}</span> がログイン中</li>
                <li class="breadcrumb-item active" aria-current="page">ユーザーid{{ Auth::user()->id }}</li>
            </ol>
        </nav>
        @endauth


        <ol class="list-group list-group-numbered" style="max-width: 400px;">
            <script>
                let a = 1;
            </script>
            @foreach($questions_q as $question_q)

            <ul class="list-group-item list-group-item-light">
                問題{{$loop->iteration}}： {{$question_q ->question }}
            </ul>
            @endforeach

        </ol>

        <span>選択肢：問題１〜５の順番に答えボタンを押してください</span>

        <form action="{{ route('answer.index') }}" method="post">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <input type="hidden" name="shuffled0Id" value="{{ $shuffled0Id }}">
            <input type="hidden" name="shuffled1Id" value="{{ $shuffled1Id }}">
            <input type="hidden" name="shuffled2Id" value="{{ $shuffled2Id }}">
            <input type="hidden" name="shuffled3Id" value="{{ $shuffled3Id }}">
            <input type="hidden" name="shuffled4Id" value="{{ $shuffled4Id }}">
            <div class="d-grid gap-2">

                <script>
                    let arr = []; // 配列を初期化する
                        let x = 1;
                </script>

                @foreach($questions_a as $question_a)
                <button type="button" value="{{ $question_a->answer }}" id="{{ $question_a->id }}"
                    onclick="buttonClick('{{ $question_a->id }}')" class="sentaku" name="arr[]">
                    {{ $question_a->answer }}</button>
                @endforeach

                <script>
                    function buttonClick(id){
                        arr.push(id); // 配列に値を追加する
                        document.getElementById(id).disabled = true;
                        value = document.getElementById(id).value;
                        document.getElementById(id).textContent = value +' 出題' + x + 'の答え';
                        x += 1;
                    };
                </script>

                <button type="submit" value="回答を確定する" type="submit" class="btn btn-outline-primary"
                    onclick="buttonClick1()">回答を確定する
                </button>

                <button type="button" value="選択を解除" class="btn btn-outline-danger" onclick="buttonClick2()">選択を解除
                </button>

                <script>
                    function buttonClick1(){
                        alert("選択肢を押した順のidを格納した配列arrの中身  → " + arr);
                        };
                
                        function buttonClick2(){
                        alert("リセットします");
                        document.getElementsByClassName('sentaku')[0].disabled = false;
                        document.getElementsByClassName('sentaku')[1].disabled = false;
                        document.getElementsByClassName('sentaku')[2].disabled = false;
                        document.getElementsByClassName('sentaku')[3].disabled = false;
                        document.getElementsByClassName('sentaku')[4].disabled = false;
                         arr = []; // 配列を初期化する
                         x = 1;
                         alert(arr);

                        };
                </script>

            </div>


        </form>

    </div>

</body>

</html>