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



  @auth
  <div class="flex justify-end items-center">
    <div>
      <a class="btn btn-link" href="/">HOME画面へ</a>
    </div>
  </div>
  @endauth
 <!-- 前の要素に戻るボタン -->
 <button id="show-prev-button" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg">
  前の問題を表示</button>
<!-- 表示用ボタン -->
<button id="show-next-button" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg">
  次の問題を表示</button>

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
      <span class="btn btn-outline-primary">■選択肢{{ $i + 1 }}：{{ "正解" }}</span>
      @else
      <span class="btn btn-outline-danger">■選択肢{{ $i + 1 }}：{{ "不正解" }}</span>
      @endif
      <div class="d-inline p-2 bd-highlight">あなたの正解率：{{ $uidseikairituModels[$i] }}% /累計回答数：{{
        $uidkaitousuuModels[$i] }}</div>
    <div class="d-sm-inline p-2 bd-highlight">みんなの正解率：{{ $allseikairituModels[$i] }}% /累計回答数：{{
        $allkaitousuuModels[$i] }}</div>

      <div class="flex items-center bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg shadow-xl p-1">
        <div class="w-12 h-6 flex items-center">
          <strong class="text-xs text-white">直近{{$i}}</strong>
        </div>
        <div class="flex-grow ml-1 bg-white p-0 rounded-md shadow">
            {{ $viewModels[$i]->getQuestion() }}
        </div>
      </div>

      <div class="flex flex-col justify-end items-end">
        <!-- Incorrect button -->

          <button type="button" value="{{ $viewModels[$i]->getmissAnswer() }}"
            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4">
            {{ $viewModels[$i]->getmissAnswer() }}
          </button>

      </div>

      <div class="flex justify-start">

        <details class="my-0">
          <summary class="text-lg font-bold text-blue-600 hover:text-blue-800 cursor-pointer">
            問題・答え・解説をセットで見る
          </summary>

                    @if ($viewModels[$i]->isCorrect() )
                    <p>解説：{{ $viewModels[$i]->getComment() }}</p>
                    <a href="{{ $viewModels[$i]->getComment() }}">解説link</a>
            

                    @else




          <div>問題側セットと編集ボタン</div>
          <div id="question-{{ $i }}"
            class="flex items-center bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg shadow-xl p-1">
            <div class="w-14 h-6 flex justify-center items-center">
              <strong class="text-lg text-white text-center">{{$i}}</strong>
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
              <strong class="text-lg text-white text-center">{{$i}}</strong>
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
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var current = 0; // 現在の要素のインデックス
      var max = {{ count($viewModels) }}; // 要素の合計数
      var displayArea = document.getElementById('display-area'); // 表示エリア
      var nextButton = document.getElementById('show-next-button');
      var prevButton = document.getElementById('show-prev-button');

      nextButton.addEventListener('click', function() {
        current = (current + 1) % max; // インデックスをインクリメントし、必要ならループする
        displayContent(current);
        updateButtonState();
      });

      prevButton.addEventListener('click', function() {
        if (current > 0) {
          current--; // インデックスをデクリメント
        } else {
          current = max - 1; // リストの最後に移動
        }
        displayContent(current);
        updateButtonState();
      });

      function displayContent(index) {
        var content = document.getElementById('item-' + index).innerHTML;
        displayArea.innerHTML = content; // 表示エリアに内容を挿入
      }

      function updateButtonState() {
        prevButton.disabled = false;
        nextButton.disabled = false;
      }

      // 初期化
      if (max > 0) {
        displayContent(0);
        updateButtonState();
      }
    });
  </script>
</body>