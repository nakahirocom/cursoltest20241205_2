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

<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
        @endauth
    </div>
    @endif
    @auth
    <div class="container">
    <p class="h2">三択アプリ</p>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><span class="mark">{{ Auth::user()->name }}</span> がログイン中</li>
          <li class="breadcrumb-item active" aria-current="page">ユーザーid{{ Auth::user()->id }}</li>
        </ol>
      </nav>

      </div>
      @endauth

    <div class="container-fluid"></div>
        <ul class="list-group">
            <br>
            <a class="btn btn-outline-dark" style="text-align:left" href="/question" role="button">1.三択を解く画面へ</a>
            <br>
            <a class="btn btn-outline-dark" style="text-align:left" href="/santakuset" role="button">2.{{ Auth::user()->name }} の三択設定へ移動する</a>
            <br>
            <a class="btn btn-outline-dark" style="text-align:left" href="/new" role="button">3.問題新規作成画面へ移動する</a>
            <br>
            <a class="btn btn-outline-dark" style="text-align:left" href="/list" role="button">4.{{ Auth::user()->name }} が作成した問題を一覧表示する</a>
          </ul>
          <form name="">
            <option type="button" value="">赤</option>
            <option type="button" value="">青</option>
            <option type="button" value="">黄</option>
          </form>

    </div>
</body>
