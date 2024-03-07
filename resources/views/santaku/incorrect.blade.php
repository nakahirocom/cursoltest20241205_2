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

    <a class="btn btn-link" href="/">index画面へ戻る</a></p>
    @auth

    <h2>三択アプリ　{{ Auth::user()->name }}が間違えた問題一覧画面　⭐️無ければ空白です。</h2>
    <p>-----------------------------------------------------------------------------------------</p>
    @if (session('feedback.success'))
    <p style="color: green">{{ session('feedback.success') }}</p>
    @endif
    @endauth

    <body>
      <div>
        @foreach($incorrectList as $incorrect)
        <div>

          <summary>
            <div class="collapse show" id="collapseExample" style="">
              <div class="card card-body">
                <p>🟧最新の間違いから{{$loop->iteration}}つ目</p>

                <p>解答日時　{{ $incorrect->updated_at}}</p>
                <p>出題問題　{{ $incorrect->question->question }}</p>
                <img src="{{ asset($incorrect->question->question_path) }}">
                <p>間違えた答え　{{ $incorrect->q_answer }}</p>
                <br>
                <p>出題問題　{{ $incorrect->question->question }}</p>
                <img src="{{ asset($incorrect->question->question_path) }}">
                <p>答え　{{ $incorrect->question->answer }}</p>
                <p>解説　{{ $incorrect->question->comment }}</p>
                <img src="{{ asset($incorrect->question->comment_path) }}">
                  <div>
                    <a href="{{ route('edit', ['questionId' => $incorrect->question_id])}}">▶️{{ $incorrect->question->question }}編集</a>
                  </div>
        
                <br>
                <p>間違えた答えの問題　{{ $incorrect->q_question }}</p>
                <img src="{{ asset($incorrect->q_question_path) }}">
                <p>答え　{{ $incorrect->q_answer }}</p>
                <p>解説　{{ $incorrect->q_comment }}</p>
                <img src="{{ asset($incorrect->q_comment_path) }}">
                  <div>
                    <a href="{{ route('edit', ['questionId' => $incorrect->answered_question_id])}}">▶︎{{ $incorrect->q_question }}編集</a>
                  </div>
        
              </div>
            </div>
          </summary>
        </div>
        <br>
        @endforeach
      </div>
    </body>
  </div>
</body>