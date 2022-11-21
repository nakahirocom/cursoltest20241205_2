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

    <a class="btn btn-link" href="/">index画面へ戻る</a></p>
    @auth
    <p class="h2">三択アプリ　編集・削除画面</p>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><span class="mark">{{ Auth::user()->name }}</span> がログイン中</li>
          <li class="breadcrumb-item active" aria-current="page">ユーザーid{{ Auth::user()->id }}</li>
        </ol>
      </nav>
      @endauth

      <p>-----------------------------------------------------------------------------------------</p>
    @if (session('feedback.success'))
    <p style="color: green">{{ session('feedback.success') }}</p>
    @endif

    <form action="{{ route('update.put', ['questionId' => $question->id])
              }}" method="post">
        @method('PUT')
        @csrf
        <br />
        <span>編集前の問題：{{ $question->question }}</span>
        <input type="text" name="question" class="form-control" value="{{ $question->question }}" >
        @error('question')
        <p style="coler: red;">{{ $message }}</p>
        @enderror
    

        <br />
        <span>編集前の答え：{{ $question->answer }}</span>
        <input type="text" name="answer" class="form-control" value="{{ $question->answer }}">
        @error('answer')
        <p style="coler: red;">{{ $message }}</p>
      @enderror

        <br />
        <span>編集前の解説：{{ $question->comment }}</span>
        <input type="text" name="comment" class="form-control" value="{{ $question->comment }}">
        @error('comment')
        <p style="coler: red;">{{ $message }}</p>
        @enderror
      
        <br />

        <br />
<br />
        <div class="col-12">
            <button type="submit" class="btn btn-outline-primary">編集したものを登録する</button>
          </div>
    </form>
    <br />

    <form action="{{ route('delete', ['questionId' => $question->id])
                    }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-outline-danger">この問題を削除</button>
        <br>
        <br>
        <span>ジャンル:</span>
        <br />
        <select name="blood"><br />
            <option value="taxmaster">税理士</option>
            <option value="programer">プログラミング</option>
            <option value="rule">会社ルール</option>
            <option value="sonota">その他</option>
        </select>
    </form>
</div>
</body>
</html>
