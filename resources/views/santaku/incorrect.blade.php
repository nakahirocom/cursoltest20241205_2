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
  @if (session('feedback.success'))
  <p class="text-green-500">{{ session('feedback.success') }}</p>
  @endif
  <div class="flex justify-end items-center">
    <div>
      <a class="btn btn-link" href="/">HOME画面へ</a>
    </div>
  </div>
  @endauth

  <div class="container text-left relative">
    <div class="border-2 border-gray-300 rounded-md p-1 shadow-lg relative">
      <div class="flex justify-between m-0">
        <div class="flex-none m-0">
          【回答違い直近20問】
        </div>
      </div>

      @csrf

      @foreach($incorrectList as $incorrect)
      <div class="flex flex-col">

        <div class="text-sm">🟧ジャンル</div>

        <div class="text-sm">

          {{ $incorrect->question->smallLabel->middleLabel->largeLabel->large_label }}→
          {{ $incorrect->question->smallLabel->middleLabel->middle_label }}→
          {{ $incorrect->question->smallLabel->small_label }}
        </div>

        <div class="text-xs">{{ $incorrect->updated_at}}</div>
      </div>
      <div id="question-{{ $loop->iteration }}"
        class="flex items-center bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg shadow-xl p-1">
        <div class="w-12 h-6 flex items-center">
          <strong class="text-xs text-white">直近{{$loop->iteration}}</strong>
        </div>
        <div class="flex-grow ml-1 bg-white p-0 rounded-md shadow">
          {{$incorrect->question->question}}
          <img src="{{ asset($incorrect->question->question_path) }}">
        </div>
      </div>

      <div class="flex flex-col justify-end items-end">
        <!-- Incorrect button -->
        <div class="text-sm mb-1">誤り⇨
          <button type="button" value="{{ $incorrect->answer }}" id="button-{{ $incorrect->id }}"
            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4">
            {{ $incorrect->q_answer }}
          </button>
        </div>
      </div>

      <div class="flex justify-start">

        <details class="my-0">
          <summary class="text-lg font-bold text-blue-600 hover:text-blue-800 cursor-pointer">
            問題・答え・解説をセットで見る
          </summary>


          <div>問題側セットと編集ボタン</div>
          <div id="question-{{ $loop->iteration }}"
            class="flex items-center bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg shadow-xl p-1">
            <div class="w-14 h-6 flex justify-center items-center">
              <strong class="text-lg text-white text-center">{{$loop->iteration}}</strong>
            </div>
            <div class="flex-grow ml-1 bg-white p-0 rounded-md shadow">
              {{$incorrect->question->question}}
              <img src="{{ asset($incorrect->question->question_path) }}">
            </div>
          </div>

          <div class="flex flex-col justify-end items-end">
            <!-- Incorrect button -->

            <button type="button" value="{{ $incorrect->answer }}" id="button-{{ $incorrect->id }}"
              class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4">
              {{ $incorrect->question->answer }}
            </button>
          </div>
          <br>

          <div>解説{{ $incorrect->question->comment }}</div>
          <img src="{{ asset($incorrect->question->comment_path) }}">
          <div>
            <a href="{{ route('edit', ['questionId' => $incorrect->question_id]) }}"
              class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300 ease-in-out">
              問題側セットを編集
            </a>
          </div>
          <br>
          <br>
          <br>

          <div>選択ミス側セットと編集ボタン</div>
          <div id="question-{{ $loop->iteration }}"
            class="flex items-center bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg shadow-xl p-1">
            <div class="w-14 h-6 flex justify-center items-center">
              <strong class="text-lg text-white text-center">{{$loop->iteration}}</strong>
            </div>
            <div class="flex-grow ml-1 bg-white p-0 rounded-md shadow">
              {{$incorrect->q_question}}
              <img src="{{ asset($incorrect->q_question_path) }}">
            </div>
          </div>
          <div class="flex flex-col justify-end items-end">
            <!-- Incorrect button -->

            <button type="button" value="{{ $incorrect->answer }}" id="button-{{ $incorrect->id }}"
              class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4">
              {{ $incorrect->q_answer }}
            </button>

          </div>
          <br>
          <div>解説　{{ $incorrect->q_comment }}</div>
          <img src="{{ asset($incorrect->q_comment_path) }}">
          <div>
            <a href="{{ route('edit', ['questionId' => $incorrect->answered_question_id]) }}"
              class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300 ease-in-out">
              選択ミス側セットを編集
            </a>
          </div>


        </details>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>

      @endforeach

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
</body>