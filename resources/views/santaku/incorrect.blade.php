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

                <p>解答日時　{{ $incorrect->updated_at}}</p>
                <p>出題問題　{{ $incorrect->question->question }}</p>
                <p>間違えた答え　{{ $incorrect->q_answer }}</p>
                <br>
                <p>出題問題　{{ $incorrect->question->question }}</p>
                <p>答え　{{ $incorrect->question->answer }}</p>
                <p>解説　{{ $incorrect->question->comment }}</p>
                <br>
                <p>間違えた答えの問題　{{ $incorrect->q_question }}</p>
                <p>答え　{{ $incorrect->q_answer }}</p>
                <p>解説　{{ $incorrect->q_comment }}</p>
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