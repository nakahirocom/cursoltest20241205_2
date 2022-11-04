<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>santakuアプリ</title>
</head>

<body>
<div class="container">
    <a class="btn btn-link" href="/">index画面へ戻る</a>
    @auth
    <p class="h3">三択アプリ　出題画面</p>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><span class="mark">{{ Auth::user()->name }}</span> がログイン中</li>
          <li class="breadcrumb-item active" aria-current="page">ユーザーid{{ Auth::user()->id }}</li>
        </ol>
      </nav>
      @endauth
Ï
    <span>問題</span>
    <p class="h2"><span class="btn btn-outline-dark">{{ $question->question }}</span>
    </p>

    <span>最も近いものを選んでください</span>

    <form action="{{ route('answer.index') }}" method="post">
        @csrf
        <input type="hidden" name="question_id" value="{{ $question->id }}">
        <input type="hidden" name="questions" value="{{ $questions }}">
        <input type="hidden" name="shuffled0Id" value="{{ $shuffled0Id }}">
        <input type="hidden" name="shuffled1Id" value="{{ $shuffled1Id }}">
        <input type="hidden" name="shuffled2Id" value="{{ $shuffled2Id }}">
        @foreach($questions as $question)
        <label class="alert alert-primary" role="alert">
            <input type="radio" name="choice_id" value="{{ $question->id }}" checked>
            {{ $question->answer }}
        </label>
        <br />
        @endforeach
        <input class="btn btn-outline-primary" type="submit" value="回答する">
    </form>
</div>

</body>

</html>