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
<body class="bg-gradient-to-r from-pink-100 via-blue-100 to-purple-100 px-4 sm:px-8 lg:px-64">
        @auth
        <div class="flex justify-between items-center">
            <!-- flexとjustify-betweenを追加 -->
            <div>
                <a class="btn btn-link" href="/">index画面へ戻る</a>
                <button type="button" onClick="history.back()" class="btn btn-link">前の画面に戻る</button>
            </div>
            <p class="h6 max-w-4xl mx-auto mp-4">
                <!-- max-w-4xlとmx-autoを追加 -->
                三択問題モード
            </p>
        
            <div class="flex ml-auto">
                <!-- ml-auto を追加 -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><span>{{ Auth::user()->name }}</span> がログイン中</li>
                        <li class="breadcrumb-item active" aria-current="page">id{{ Auth::user()->id }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    

    @endauth



    <div class="text-xl font-">【問題】</div>
    @foreach($questions_q as $question_q)
    @if ($loop->index <= 2) <!-- mb-4 クラスを削除して問題間のスペースを無くす -->
        <div>
            <!-- question-に数字を１から入れる -->
            <div id="question-{{ $loop->iteration }}"
                class="question flex items-center bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg shadow-xl p-1">
                <div class="w-14 h-6 flex justify-center items-center">
                    <strong class="text-lg text-white text-center">{{$loop->iteration}}問目</strong>
                </div>
                <div class="flex-grow ml-1 bg-white p-1 rounded-md shadow">
                    {{$question_q->question}}
                </div>
            </div>
        </div>
        <div id="question-area-{{ $loop->iteration }}" class="min-h-[50px]">　　　　</div>
        @endif
        @endforeach


        <div class="text-xl font-bold animate-pulse">【選択肢】</div>
        <div class="container text-center">
            <form action="{{ route('answer.index') }}" method="post" id="kotae"
                class="border-2 border-gray-300 rounded-md p-4 shadow-lg">
                @csrf
                <input type="hidden" name="question1_Id" value="{{ $question1_Id }}">
                <input type="hidden" name="question2_Id" value="{{ $question2_Id }}">
                <input type="hidden" name="question3_Id" value="{{ $question3_Id }}">

                <div class="flex flex-wrap items-center my-2">
                    @foreach($questions_a as $question_a)
                    <div id="buttonz-{{ $question_a->id }}">
                        <button type="button" value="{{ $question_a->answer }}" id="button-{{ $question_a->id }}"
                            onclick="buttonClick({{ $question_a->id }})"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-md shadow-inner transition duration-300 ease-in-out focus:outline-none disabled:opacity-50 text-left mr-2 mb-2">
                            {{$question_a->answer}}
                        </button>
                    </div>
                    @endforeach
                </div>

                <style>
                    .question {
                        transition: all 0.3s ease-in-out;
                        opacity: 0.5;
                    }

                    .highlighted-question {
                        transform: scale(1.05);
                        /* サイズを少し大きくする */
                        background-color: #ffd700;
                        /* ゴールド色で背景を強調 */
                        opacity: 1;
                        /* 透明度を通常に戻す */
                    }

                    /* 選択確定ボタンの通常スタイル */
                    #kakutei {
                        background-color: #e5e7eb;
                        /* 薄いグレー */
                        color: #9ca3af;
                        /* 暗いグレー */
                        border-color: #d1d5db;
                        cursor: not-allowed;
                    }

                    /* 選択確定ボタンが有効化されたときのスタイル */
                    #kakutei.enabled {
                        background-color: #34d399;
                        /* 明るい緑色 */
                        color: white;
                        border-color: #059669;
                        cursor: pointer;
                    }
                </style>


                <script>
                    window.onload = function() {
                           // 最初の問題を強調
                           let firstQuestion = document.getElementById('question-1');
                           if (firstQuestion) {
                               firstQuestion.classList.add('highlighted-question');
                           }
                        };


                    let clickCounter = 1;
                    let x = 1;
                    let arr = [];// 配列を初期化する

                    function buttonClick(questionId) {
                        // 既に3回クリックされた場合は、それ以上の操作を許可しない
                        if (arr.length >= 3) {
                            return;
                        }
                        if (x >= 0) {
                            arr.push(questionId); // 配列にボタンIDを追加
                        }

                    let button = document.getElementById('button-' + questionId);
                    let questionArea = document.getElementById('question-area-' + clickCounter);
                    clickCounter++; // カウンターを増やす

                       if (questionArea) {
                           questionArea.appendChild(button); // ボタンを適切なエリアに移動
                           button.disabled = true; // ボタンを無効化
                       }

                       // すべての問題の強調を解除
                       for (let i = 1; i <= 3; i++) {
                           let question = document.getElementById('question-' + i);
                           question.classList.remove('highlighted-question');
                       }

                       // 次の問題を強調
                       if (clickCounter <= 3) {
                           let nextQuestion = document.getElementById('question-' + clickCounter);
                           if (nextQuestion) {
                               nextQuestion.classList.add('highlighted-question');
                           }
                       }

                        // 3つの選択が完了したら、確定ボタンを有効化
                       if (arr.length === 3) {
                            let confirmButton = document.getElementById('kakutei');
                            confirmButton.disabled = false;
                            confirmButton.classList.add('enabled');
                       }
                    }
                </script>
        </div>
        </div>

        <div class="flex justify-between gap-4">
            <div class="flex-grow">
                <button id="kakutei" type="submit" value="回答を確定する"
                    class="h-12 w-full my-2 px-4 py-2 border-2 rounded-md bg-gray-200 text-gray-500 border-gray-300 cursor-not-allowed"
                    onclick="buttonClick1()">
                    答え合わせ
                </button>
            </div>

            <div>
                <button type="button"
                    class="h-12 my-2 px-4 py-2 border-2 border-red-500 rounded-md bg-gradient-to-r from-pink-500 to-yellow-500 text-white font-semibold text-lg shadow-lg hover:shadow-xl transition duration-300 from-pink-600 to-yellow-600"
                    onclick="buttonClick2()">
                    選択リセット
                </button>
            </div>
        </div>

        </form>

        <script>
            function buttonClick1(){
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
                
            function buttonClick2() {
                // クリックカウンターと選択肢配列をリセット
                clickCounter = 1;

              let button = document.getElementById('button-'+arr[0]);
              let motonoId = 'buttonz-'+arr[0];
              let moto = document.getElementById(motonoId);

              if (moto) {
                  moto.appendChild(button); // ボタンを適切なエリアに移動
                  button.disabled = false; // ボタンを押せる様に変更
              }
            
              button = document.getElementById('button-'+arr[1]);
              motonoId = 'buttonz-'+arr[1];
              moto = document.getElementById(motonoId);
            
              if (moto) {
                  moto.appendChild(button); // ボタンを適切なエリアに移動
                  button.disabled = false; // ボタンを押せる様に変更
                
              }
               button = document.getElementById('button-'+arr[2]);
               motonoId = 'buttonz-'+arr[2];
               moto = document.getElementById(motonoId);
            
              if (moto) {
                  moto.appendChild(button); // ボタンを適切なエリアに移動
                  button.disabled = false; // ボタンを押せる様に変更
                
              }
            
              arr = [];    // すでに選んだ選択肢IDが入った配列をリセット

              // 確定ボタンを無効化してスタイルをリセット
              let confirmButton = document.getElementById('kakutei');
              if (confirmButton) {
                  confirmButton.disabled = true;//無効化する
                  confirmButton.classList.remove('enabled');
              }
            
              // すべての問題の強調を解除し、最初の問題を強調
              highlightFirstQuestion();
            
            
            function highlightFirstQuestion() {
                      // すべての問題の強調を解除
                      for (let i = 1; i <= 3; i++) {
                          let question = document.getElementById('question-' + i);
                              if (question) {
                              question.classList.remove('highlighted-question');
                              }
                      }

                        // 最初の問題を強調
                       let firstQuestion = document.getElementById('question-1');
                        if (firstQuestion) {
                            firstQuestion.classList.add('highlighted-question');
                        }
            }
        }
        </script>
        </div>
        </div>
</body>
</html>