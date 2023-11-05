<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->

    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>santakuアプリ</title>
</head>

<body>
    <div class="container">
        <a class="btn btn-link" href="/">index画面へ戻る</a>
        <button type="button" onClick="history.back()"
            class="opacity-30 bg-fuchsia-500 text-white px-2 py-1">前の画面に戻る</button>

        @auth
        <p class="h3">三択アプリ　ひたすら問題を解きまくりモード</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span class="mark">{{ Auth::user()->name }}</span> がログイン中</li>
                <li class="breadcrumb-item active" aria-current="page">ユーザーid{{ Auth::user()->id }}</li>
            </ol>
        </nav>
        @endauth

<h1>jQueryの勉強</h1>
<script>
    $(function() {
        $('h1').css('color','red');
    });
        
</script>

        <div>🔹問題</div>
        @foreach($questions_q as $question_q)
        @if ($loop->index <= 2)
        <div class="flex">
            <div>　</div>
            <div class="flex-none w-14 h-6">
                <strong class="text-red-500">{{$loop->iteration}}問目</strong>
            </div>
            <div class="border flex-initial w-64">
                {{$question_q ->question }}
            </div>
        </div>
        @endif
        @endforeach

        <div>　</div>
        <div>🔹選択肢：1問目から3問目の順に答えを押してください</div>
        <form action="{{ route('answer.index') }}" method="post" id="kotae">
            @csrf
            <input type="hidden" name="question1_Id" value="{{ $question1_Id }}">
            <input type="hidden" name="question2_Id" value="{{ $question2_Id }}">
            <input type="hidden" name="question3_Id" value="{{ $question3_Id }}">



            <script>
                let arr = []; // 配列を初期化する
                        let x = 1;
            </script>

            @foreach($questions_a as $question_a)
            <div class="flex">
                <div>　</div>
                <div>
                    <button type="button" value="{{ $question_a->answer }}" id="{{ $question_a->id }}"
                        onclick="buttonClick({{ $question_a->id }})"
                        class="sentaku border border-blue-400 px-1 py-2 text-sm font-medium">
                             {{$question_a->answer }}

                    </button>
                </div>
                <div>　</div>
                <div id={{ $question_a->id  * 10 }} class="monme"></div>
            </div>
            @endforeach


            <script>
                function buttonClick(id){
                    if (x <= 3){

                    arr.push(id); // 配列に値を追加する
                        document.getElementById(id).disabled = true;
                        document.getElementById(id * 10).textContent = x + "問目の答え";
                        x += 1;
                    }else{
                        document.getElementById(id).disabled = true;
                        document.getElementById(id * 10).textContent = "ダミーの答え";
                        
                    }

                    };
            </script>

            <div class="container text-center">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <button type="button" value="選択を解除" class="my-2 px-4 py-2
                        border-2 border-red-500 rounded-md
                        bg-gradient-to-b from-red-600 to-red-400
                        hover:from-red-500 hover:to-red-300 
                        text-white shadow-lg"
                            onclick="buttonClick2()" style="max-width: 800px;">　選択リセットボタン　
                        </button>
                    </div>
                    <div class="col-4">
                        <button id="kakutei" type="submit" value="回答を確定する" type="submit" class="my-2 px-4 py-2
                        border-2 border-blue-500 rounded-md
                        bg-gradient-to-b from-blue-600 to-blue-400
                        hover:from-blue-500 hover:to-blue-300 
                        text-white shadow-lg"
                             onclick="buttonClick1()"
                            >　　選択確定ボタン　　
                        </button>
                    </div>
                </div>
            </div>

            <script>
                function buttonClick1(){
                        alert("選択肢を押した順のidを格納した配列arrの中身  → " + arr);

                    //操作するid要素を取得する
                    var kotae = document.getElementById('kotae');
                    // 3回転ループし、追加する配列の数だけinput要素を作成
                    
                    for (let step = 0; step < 3; step++) {
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
                    // 追加する要素を作成 値が 0 から 3 まで計 4 回実行される
                    for (let step = 0; step < 4; step++) {
                    // 押せなくなったbuttonを押せるようにする
                        document.getElementsByClassName('sentaku')[step].disabled = false;
                    // ◯問目の答え　のテキスト表示を削除する
                        document.getElementsByClassName('monme')[step].textContent = "";
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