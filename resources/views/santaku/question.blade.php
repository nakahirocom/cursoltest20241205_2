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

        <div>🔹問題</div>
        @foreach($questions_q as $question_q)
        <div class="flex">
            <div>　</div>
            <div class="border flex-none w-14 h-6">
                <strong class="text-red-500">{{$loop->iteration}}問目</strong>
            </div>
            <div class="border flex-initial w-64">
                {{$question_q ->question }}
            </div>
        </div>
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
                        class="sentaku rounded-lg border border-primary-500 bg-primary-500 px-5 py-2.5 text-left text-sm font-medium text-white shadow-sm transition-all hover:border-primary-700 hover:bg-primary-700 focus:ring focus:ring-primary-200 disabled:cursor-not-allowed disabled:border-primary-300 disabled:bg-primary-300">
                        <span
                            class="absolute w-64 h-0 transition-all duration-300 origin-center rotate-45 -translate-x-20 bg-indigo-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease　hover:to-blue-300 
                            text-white shadow-lg"></span>
                        <span class="relative text-indigo-600 transition duration-300 group-hover:text-white ease">
                             {{$question_a->answer }}</span>

                    </button>
                </div>
                <div>　</div>
                <div id={{ $question_a->id  * 10 }}></div>
            </div>
            @endforeach


            <script>
                function buttonClick(id){
                        arr.push(id); // 配列に値を追加する
                        document.getElementById(id).disabled = true;
                        document.getElementById(id * 10).textContent = x + "問目の答え";
                        x += 1;
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
                    // 追加する要素を作成
                    for (let step = 0; step < 3; step++) {
                    // 値が 0 から 2 まで計 3 回実行される
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