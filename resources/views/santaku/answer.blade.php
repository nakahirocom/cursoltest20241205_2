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
    <div class="container">
        <a class="btn btn-link" href="/">HOME画面へ戻る</a>
        <a class="btn btn-link" href="/question">次の問題へ</a>

        @auth

        @endauth

            <!-- 変更前のアンサーコード 


        @for ($i = 0; $i < count($viewModels); $i++) 

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

    </div>
</body>

</html>

-->

<!-- 表示エリア -->
<div id="display-area"></div>

  @auth
  <div class="flex justify-end items-center">
    <div>
      <a class="btn btn-link" href="/">HOME画面へ</a>
    </div>
  </div>
  @endauth

<!-- 表示用ボタン -->
<button id="show-next-button" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg">
  １問ずつ答え合わせする</button>

  <div class="container text-left relative">
    <div class="border-2 border-gray-300 rounded-md p-1 shadow-lg relative">
      <div class="flex justify-between m-0">
        <div class="flex-none m-0">
          【答え合わせ】
        </div>
      </div>

      @csrf


      @for ($i = 0; $i < count($viewModels); $i++) 
    
@if ($viewModels[$i]->isCorrect() )
<div id="youso{{ $i }}">
<span id="result-{{ $i }}" class="btn btn-outline-primary">■出題{{ $i + 1 }}問目：正解</span>
@else
  <span id="result-{{ $i }}" class="btn btn-outline-danger">■出題{{ $i + 1 }}問目：不正解</span>
@endif


      <div class="flex items-center bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg shadow-xl p-1">
        <div class="w-12 h-6 flex items-center">
          <strong class="text-xs text-white">出題{{$i+1}}問目</strong>
        </div>
        <div class="flex-grow ml-1 bg-white p-0 rounded-md shadow">
            {{ $viewModels[$i]->getQuestion() }}
        </div>
      </div>

      <div class="flex flex-col justify-end items-end">
        <!-- Incorrect button -->

        <div id="answer-{{ $i }}" class="flex items-center">

        <button type="button" value="{{ $viewModels[$i]->getmissAnswer() }}"
            class="answer-button bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4"
            data-correct="{{ $viewModels[$i]->isCorrect() ? 'true' : 'false' }}">
            {{ $viewModels[$i]->getmissAnswer() }}
          </button>
          <span class="ml-2 hidden" id="mark-{{ $i }}"></span>
        </div>

      </div>

      <div class="flex justify-start">

        <details class="my-0">
            <div class="d-inline p-0 bd-highlight">あなたの正解率：{{ $uidseikairituModels[$i] }}% /累計回答数：{{
                $uidkaitousuuModels[$i] }}</div>
            <div class="d-sm-inline p-0 bd-highlight">みんなの正解率：{{ $allseikairituModels[$i] }}% /累計回答数：{{
                $allkaitousuuModels[$i] }}</div>
        

                    @if ($viewModels[$i]->isCorrect() )
                    <p>解説：{{ $viewModels[$i]->getComment() }}</p>
                    <a href="{{ $viewModels[$i]->getComment() }}">解説link</a>
            

                    @else




          <div>問題側セットと編集ボタン</div>
          <div id="question-{{ $i }}"
            class="flex items-center bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg shadow-xl p-1">
            <div class="w-14 h-6 flex justify-center items-center">
              <strong class="text-lg text-white text-center">{{$i+1}}</strong>
            </div>
            <div class="flex-grow ml-1 bg-white p-0 rounded-md shadow">
                {{ $viewModels[$i]->getQuestion() }}
            </div>
          </div>

          <div class="flex flex-col justify-end items-end">
            <!-- Incorrect button -->

            <button type="button" value="{{ $viewModels[$i]->getAnswer() }}"
              class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4">
              {{ $viewModels[$i]->getAnswer() }}
            </button>
          </div>
          <br>

          <div>解説{{ $viewModels[$i]->getComment() }}</div>
          <img src="{{ $viewModels[$i]->getComment_path() }}">
          <br>

          <div>選択ミス側セットと編集ボタン</div>
          <div id="question-{{ $i }}"
            class="flex items-center bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg shadow-xl p-1">
            <div class="w-14 h-6 flex justify-center items-center">
              <strong class="text-lg text-white text-center">{{$i+1}}</strong>
            </div>
            <div class="flex-grow ml-1 bg-white p-0 rounded-md shadow">
                {{ $viewModels[$i]->getmissQuestion() }}
            </div>
          </div>
          <div class="flex flex-col justify-end items-end">
            <!-- Incorrect button -->

            <button type="button" value="{{ $viewModels[$i]->getmissAnswer() }}"
              class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4">
              {{ $viewModels[$i]->getmissAnswer() }}
            </button>

          </div>
          <br>
          <div>解説　{{ $viewModels[$i]->getmissComment() }}</div>
          <div>
          </div>

          @endif

        </details>
      </div>
    </div>
</div>
      
    @endfor

      <style>
        .question {
          transition: all 0.3s ease-in-out;
          opacity: 0.5;
        }

        .highlighted-question {
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
    </div>
  </div>

  <div class="relative container border-2 border-gray-300 rounded-md p-4 shadow-lg">
    <div class="absolute top-0 left-0">
        【答え合わせ完了】
    </div>

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
document.getElementById('show-next-button').addEventListener('click', function() {
  var answers = document.querySelectorAll('.answer-button');
  function showAnswer(index) {
    if (index < answers.length) {
      var answer = answers[index];
      var mark = document.getElementById('mark-' + index);
      var questionDiv = document.getElementById('q-' + (index + 4)); // Adjust index for question div
      var answerDiv = document.getElementById('a-' + (index + 4)); // Adjust index for answer div

      mark.classList.remove('hidden');
      questionDiv.classList.remove('hidden'); // Make question div visible

      if (answer.getAttribute('data-correct') === 'true') {
        mark.textContent = '〇'; // Correct mark
        mark.classList.add('text-green-500', 'font-bold', 'text-xl');
        answerDiv.textContent = '正解'; // Update answer div text for correct
      } else {
        mark.textContent = '✕'; // Incorrect mark
        mark.classList.add('text-red-500', 'font-bold', 'text-xl');
        answerDiv.textContent = '不正解'; // Update answer div text for incorrect
      }

      setTimeout(function() { showAnswer(index + 1); }, 1000); // Show next answer after 1 second
    }
  }

  showAnswer(0); // Start with the first element
});

  </script>
    
</body>