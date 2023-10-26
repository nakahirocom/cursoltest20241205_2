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



        <div class="container text-left">
            <div class="row justify-content-start">
                @foreach($questions_q as $question_q)
                <div class="col-1">
                    <strong>
                        問題{{$loop->iteration}}
                    </strong>
                </div>
                <div class="col-11">
                    {{$question_q ->question }}
                </div>
                @endforeach
            </div>
        </div>

        <p class="text-white bg-primary">選択肢：問題１〜５の順番に答えボタンを押してください</p>

        <form action="{{ route('answer.index') }}" method="post" id="kotae">
            @csrf
            <input type="hidden" name="question1_Id" value="{{ $question1_Id }}">
            <input type="hidden" name="question2_Id" value="{{ $question2_Id }}">
            <input type="hidden" name="question3_Id" value="{{ $question3_Id }}">
            <input type="hidden" name="question4_Id" value="{{ $question4_Id }}">
            <input type="hidden" name="question5_Id" value="{{ $question5_Id }}">
            <div class="d-grid gap-2">


                <script>
                    let arr = []; // 配列を初期化する
                        let x = 1;
                </script>

                @foreach($questions_a as $question_a)
                <div style="display:inline-flex table-hover">
                    <button type="button" value="{{ $question_a->answer }}" id="{{ $question_a->id }}"
                        onclick="buttonClick('{{ $question_a->id }}')" class="sentaku table-hover"
                        style="max-width: 800px;">
                        {{ $question_a->answer }}
                    </button>
                </div>
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

                <div class="container text-center">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <button type="button" value="選択を解除" class="btn btn-outline-danger" onclick="buttonClick2()"
                                style="max-width: 800px;">　選択リセットボタン　
                            </button>
                        </div>
                        <div class="col-4">
                            <button id="kakutei" type="submit" value="回答を確定する" type="submit"
                                class="btn btn-outline-primary" onclick="buttonClick1()"
                                style="max-width: 800px;">　　選択確定ボタン　　
                            </button>
                        </div>
                    </div>
                </div>

                <script>
                    function buttonClick1(){
                        alert("選択肢を押した順のidを格納した配列arrの中身  → " + arr);

                    //操作するid要素を取得する
                    var kotae = document.getElementById('kotae');
                    // ５回転ループし、追加する配列の数だけinput要素を作成
                    for (let step = 0; step < 5; step++) {
                    // input要素の中身を作成
                    var input_data = document.createElement('input');
                        input_data.type = 'hidden';
                        input_data.name = "choice" + (step +1) + "_Id";
                        input_data.value = arr[step];
                     // input要素を追加する
                        kotae.appendChild(input_data);
                }
                    };
                
                        function buttonClick2(){
                        alert("リセットします");
                    // 追加する要素を作成
                    for (let step = 0; step < 5; step++) {
                    // 値が 0 から 4 まで計 5 回実行される
                        document.getElementsByClassName('sentaku')[step].disabled = false;
                    }
                        arr = []; // 配列を初期化する
                         x = 1;

                        };
                </script>

            </div>


        </form>

    </div>

</body>

</html>