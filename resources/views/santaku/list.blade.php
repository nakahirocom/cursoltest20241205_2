<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>santakuアプリ</title>
</head>

<a class="btn" href="/">index画面へ戻る</a></p>
@auth
<p>ようこそ、{{ Auth::user()->name }}さん</p>
<p>ユーザーidは、{{ Auth::user()->id }}です</p>
@endauth

<p>-----------------------------------------------------------------------------------------</p>
<h2>三択アプリ　{{ Auth::user()->name }}が作った問題一覧画面</h2>
<p>-----------------------------------------------------------------------------------------</p>
@if (session('feedback.success'))
<p style="color: green">{{ session('feedback.success') }}</p>
@endif


<body>

  <div>
    @foreach($santakuList as $santaku)

    <summary>
      <p>問題　{{ $santaku->question }}</p>
      <p>答え　{{ $santaku->answer }}</p>
      <p>解説　{{ $santaku->comment }}</p>

    </summary>
    <div>
      <a href="{{ route('edit', ['santakuId' => $santaku->id]) }}">編集</a>
      <form action="{{ route('delete', ['santakuId' => $santaku->id]) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">削除</button>
      </form>
    </div>
    @endforeach
  </div>
</body>