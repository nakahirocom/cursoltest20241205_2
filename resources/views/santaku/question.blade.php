<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->

    <link rel="stylesheet" href="/css/app.css">
    <title>santakuアプリ</title>

</head>

<body class="bg-gradient-to-r from-pink-100 via-blue-100 to-purple-100 px-4 sm:px-8 lg:px-64">
    @auth
    <div class="flex justify-between items-center">
        <!-- flexとjustify-betweenを追加 -->
        @foreach($questionj as $question_j)
        ｼﾞｬﾝﾙ:
        {{ $question_j->smallLabel->middleLabel->middle_label }}-

        {{ $question_j->smallLabel->small_label }}

        @endforeach

        <div>
            <a class="btn btn-link text-gray-500 hover:text-gray-700 underline decoration-gray-500 hover:decoration-blue-700 transition duration-300 ease-in-out" href="/">HOMEへ</a>
        </div>

    </div>


    @endauth

    <div class="container text-left relative">
        <form action="{{ route('answer.index') }}" method="post" id="kotae"
            class="border-2 border-gray-300 rounded-md p-0 shadow-lg relative">
            <input type="hidden" name="maxQuestions" value="{{ count($questions_a) }}">
            <div class="flex justify-between m-0">
                <div class="flex-none m-0">
                    【選択肢】
                </div>
                    <div class="w-full">
                        <button id="kakutei" type="submit" value="回答を確定する"
                                class="h-8 w-full my-0 px-0 py-1 border-2 rounded-md bg-gray-200 text-gray-500 border-gray-300 cursor-not-allowed"
                                onclick="buttonClick1()">
                            答え合わせ
                        </button>
                    </div>
                    <div class="w-full">
                        <button type="button"
                            class="h-8 w-full my-0 px-0 py-1 border-2 border-red-500 rounded-md bg-gradient-to-r from-pink-500 to-yellow-500 text-white font-semibold text-sm shadow-lg hover:shadow-xl transition duration-300"
                            onclick="buttonClick2()">
                            選択リセット
                        </button>
                    </div>
                </div>
    
            <!--このリファクタリングでは、$questionIds 配列の各要素に対してループを行います。$loop->iteration は現在のループの繰り返し数を表し、これを使ってフォームフィールドの名前を動的に生成しています。これにより、各質問IDに対応する隠しフィールドが作成されます。また、@csrf ディレクティブはループの外に一度だけ配置するのが適切です。-->
            @foreach($questionIds as $questionId)
            @csrf
            <input type="hidden" name="question{{ $loop->iteration }}_Id" value="{{ $questionId }}">
            @endforeach

            <div class="flex flex-wrap items-center my-2">
                @foreach($questions_a as $question_a)
                <div id="buttonz-{{ $question_a->id }}">
                    <button type="button" value="{{ $question_a->answer }}" id="button-{{ $question_a->id }}"
                        onclick="buttonClick({{ $question_a->id }})"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-1 px-2 rounded-md shadow-inner transition duration-300 ease-in-out focus:outline-none disabled:opacity-50 text-left mr-1 mb-1">
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
                let maxQuestions = {{ count($questions_a) }};
                window.onload = function() {
                       // 最初の問題を強調
                       let firstQuestion = document.getElementById('question-1');
                       if (firstQuestion) {
                           firstQuestion.classList.add('highlighted-question');
                       }
                    };


                let clickCounter = 1;
                let idousakiCounter = 4;
                let x = 1;
                let arr = [];// 配列を初期化する

                function buttonClick(questionId) {
                    // 既に3回クリックされた場合は、それ以上の操作を許可しない
                    if (arr.length >= maxQuestions) {
                        return;
                    }
                    if (x >= 0) {
                        arr.push(questionId); // 配列にボタンIDを追加
                    }

                    let qq = document.getElementById('question-' + clickCounter);
                    let button = document.getElementById('button-' + questionId);
                    
                //回答したボタンをa-4へ移動させるための指定
                let qquestionArea = document.getElementById('q-' + idousakiCounter);
                let questionArea = document.getElementById('a-' + idousakiCounter);
                clickCounter++; // カウンターを増やす
                idousakiCounter++; // カウンターを増やす

                   if (questionArea) {
                    qquestionArea.appendChild(qq); // ボタンを適切なエリアに移動
                    questionArea.appendChild(button); // ボタンを適切なエリアに移動
                    qquestionArea.classList.remove('hidden');
                    // 選択された問題と答えをくっつけるためにmb-2クラスを削除してスペースを0にする
                    qq.classList.remove('mb-2');

                    button.disabled = true; // ボタンを無効化
                   }

                   // すべての問題の強調を解除
                   for (let i = 1; i <= maxQuestions; i++) {
                       let question = document.getElementById('question-' + i);
                       question.classList.remove('highlighted-question');
                   }

                   // 次の問題を強調
                   if (clickCounter <= maxQuestions) {
                       let nextQuestion = document.getElementById('question-' + clickCounter);
                       if (nextQuestion) {
                           nextQuestion.classList.add('highlighted-question');
                       }
                   }

                    // 3つの選択が完了したら、確定ボタンを有効化
                   if (arr.length === maxQuestions) {
                        let confirmButton = document.getElementById('kakutei');
                        confirmButton.disabled = false;
                        confirmButton.classList.add('enabled');
                   }
                }
            </script>
    </div>
    </form>

    <div class="relative container border-2 border-gray-300 rounded-md p-6 shadow-lg">
        <!-- 【問題】の位置を左上に寄せ、パディングを追加 -->
        <div class="absolute top-0 left-0">
            【問題】
        </div>

        @foreach($questions_q as $question_q)
        @if ($loop->index <= 7) <!-- 問題のスペースを調整するためのdiv -->
            <div id="questionz-{{ $loop->iteration }}">
                <!-- 例: pt-8 で上部にスペースを追加 -->
                <div id="question-{{ $loop->iteration }}"
                    class="question items-center bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg shadow-xl p-1 mb-2">
                    <div class="w-14 h-6 justify-center items-center">
                        <strong class="text-lg text-white text-center">{{$loop->iteration}}問目</strong>
                    </div>
                    <div class="flex-grow ml-1 bg-white p-1 rounded-md shadow">

                        <div class="overflow-auto w-full max-w-none flex-grow ml-1 bg-white p-0 rounded-md shadow">

                            {{$question_q->question}} <a href="{{ route('edit', ['questionId' => $question_q->id]) }}"
                                class="bg-green-500 text-white font-bold py-1 px-1 rounded hover:bg-green-700 transition duration-300 ease-in-out">
                                編集
                            </a>

                            <img src="{{ asset($question_q->question_path) }}" class="max-w-none max-h-[280px]">
                        </div>

                    </div>

                </div>


            </div>




    @endif

    @endforeach
</div>

    <div class="relative container border-2 border-gray-300 rounded-md p-4 shadow-lg">
        <div class="absolute top-0 left-0">
            【回答済】
        </div>
<br>
        <div id="q-4" class="py-0 hidden">出題1問目</div>
        <div id="a-4" class="py-0 text-right"></div>
        <div id="q-5" class="py-0 hidden">出題2問目</div>
        <div id="a-5" class="py-0 text-right"></div>
        <div id="q-6" class="py-0 hidden">出題3問目</div>
        <div id="a-6" class="py-0 text-right"></div>
        <div id="q-7" class="py-0 hidden">出題4問目</div>
        <div id="a-7" class="py-0 text-right"></div>
        <div id="q-8" class="py-0 hidden">出題5問目</div>
        <div id="a-8" class="py-0 text-right"></div>
        <div id="q-9" class="py-0 hidden">出題6問目</div>
        <div id="a-9" class="py-0 text-right"></div>
        <div id="q-10" class="py-0 hidden">出題7問目</div>
        <div id="a-10" class="py-0 text-right"></div>
    </div>

    <script>
        function buttonClick1(){
                            //操作するid要素を取得する
                            var kotae = document.getElementById('kotae');

                            // 3回転ループし、追加する配列の数だけinput要素を作成
                            for (let step = 0; step < 8; step++) {
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
                idousakiCounter = 4;
              let button0 = document.getElementById('button-'+arr[0]);
              let motonoId0 = 'buttonz-'+arr[0];
              let moto0 = document.getElementById(motonoId0);

              let qq1 = document.getElementById('question-' + clickCounter);
              let q1motonoId = 'questionz-'+ clickCounter;
            let q1moto = document.getElementById(q1motonoId);
            let qquestionArea4 = document.getElementById('q-' + idousakiCounter);

              if (moto0) {
                  moto0.appendChild(button0); // ボタンを適切なエリアに移動
                  q1moto.appendChild(qq1); // ボタンを適切なエリアに移動
 // mb-2クラスを元に戻す
 qq1.classList.add('mb-2');
 qquestionArea4.classList.add('hidden');
 button0.disabled = false; // ボタンを押せる様に変更
              }
            clickCounter ++;
            idousakiCounter ++;
              button1 = document.getElementById('button-'+arr[1]);
              motonoId1 = 'buttonz-'+arr[1];
              moto1 = document.getElementById(motonoId1);
            
              qq2 = document.getElementById('question-'+clickCounter);
              q2motonoId = 'questionz-'+clickCounter;
              q2moto = document.getElementById(q2motonoId);
              let qquestionArea5 = document.getElementById('q-' + idousakiCounter);

              if (moto1) {
                  moto1.appendChild(button1); // ボタンを適切なエリアに移動
                  q2moto.appendChild(qq2); // ボタンを適切なエリアに移動
 // mb-2クラスを元に戻す
 qq2.classList.add('mb-2');
 qquestionArea5.classList.add('hidden');
                  button1.disabled = false; // ボタンを押せる様に変更
                
              }
              clickCounter ++;
              idousakiCounter ++;
              button2 = document.getElementById('button-'+arr[2]);
               motonoId2 = 'buttonz-'+arr[2];
               moto2 = document.getElementById(motonoId2);

               qq3 = document.getElementById('question-'+clickCounter);
              q3motonoId = 'questionz-'+clickCounter;
               q3moto = document.getElementById(q3motonoId);
               let qquestionArea6 = document.getElementById('q-' + idousakiCounter);


              if (moto2) {
                  moto2.appendChild(button2); // ボタンを適切なエリアに移動
                  q3moto.appendChild(qq3); // ボタンを適切なエリアに移動
 // mb-2クラスを元に戻す
 qq3.classList.add('mb-2');
 qquestionArea6.classList.add('hidden');
                  button2.disabled = false; // ボタンを押せる様に変更
                
              }
              clickCounter ++;
              idousakiCounter ++;
              button3 = document.getElementById('button-'+arr[3]);
               motonoId3 = 'buttonz-'+arr[3];
                moto3 = document.getElementById(motonoId3);

               qq4 = document.getElementById('question-'+clickCounter);
              q4motonoId = 'questionz-'+clickCounter;
              q4moto = document.getElementById(q4motonoId);
              let qquestionArea7 = document.getElementById('q-' + idousakiCounter);


              if (moto3) {
                  moto3.appendChild(button3); // ボタンを適切なエリアに移動
                  q4moto.appendChild(qq4); // ボタンを適切なエリアに移動
// mb-2クラスを元に戻す
qq4.classList.add('mb-2');
qquestionArea7.classList.add('hidden');
                   button3.disabled = false; // ボタンを押せる様に変更
                
              }
              clickCounter ++;
              idousakiCounter ++;
              button4 = document.getElementById('button-'+arr[4]);
               motonoId4 = 'buttonz-'+arr[4];
               moto4 = document.getElementById(motonoId4);

               qq5 = document.getElementById('question-'+clickCounter);
              q5motonoId = 'questionz-'+clickCounter;
              q5moto = document.getElementById(q5motonoId);
              let qquestionArea8 = document.getElementById('q-' + idousakiCounter);


              if (moto4) {
                  moto4.appendChild(button4); // ボタンを適切なエリアに移動
                  q5moto.appendChild(qq5); // ボタンを適切なエリアに移動
// mb-2クラスを元に戻す
qq5.classList.add('mb-2');
qquestionArea8.classList.add('hidden');
                   button4.disabled = false; // ボタンを押せる様に変更
                
              }
              clickCounter ++;
              idousakiCounter ++;
              button5 = document.getElementById('button-'+arr[5]);
               motonoId5 = 'buttonz-'+arr[5];
               moto5 = document.getElementById(motonoId5);

               qq6 = document.getElementById('question-'+clickCounter);
              q6motonoId = 'questionz-'+clickCounter;
              q6moto = document.getElementById(q6motonoId);
              let qquestionArea9 = document.getElementById('q-' + idousakiCounter);


              if (moto5) {
                  moto5.appendChild(button5); // ボタンを適切なエリアに移動
                  q6moto.appendChild(qq6); // ボタンを適切なエリアに移動
// mb-2クラスを元に戻す
qq6.classList.add('mb-2');
qquestionArea9.classList.add('hidden');
                  button5.disabled = false; // ボタンを押せる様に変更
                
              }
              clickCounter ++;
              idousakiCounter ++;
              button6 = document.getElementById('button-'+arr[6]);
               motonoId6 = 'buttonz-'+arr[6];
               moto6 = document.getElementById(motonoId6);

               qq7 = document.getElementById('question-'+clickCounter);
              q7motonoId = 'questionz-'+clickCounter;
              q7moto = document.getElementById(q7motonoId);
              let qquestionArea10 = document.getElementById('q-' + idousakiCounter);


              if (moto6) {
                  moto6.appendChild(button6); // ボタンを適切なエリアに移動
                  q7moto.appendChild(qq7); // ボタンを適切なエリアに移動
// mb-2クラスを元に戻す
qq7.classList.add('mb-2');
qquestionArea10.classList.add('hidden');
                  button6.disabled = false; // ボタンを押せる様に変更
                
              }
            
              arr = [];    // すでに選んだ選択肢IDが入った配列をリセット
              clickCounter = 1;
                idousakiCounter = 4;

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
                      for (let i = 1; i <= 7; i++) {
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