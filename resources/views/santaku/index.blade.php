<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>santakuアプリ</title>
</head>

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
    <p>ようこそ、{{ Auth::user()->name }}さん</p>
    <p>ユーザーidは、{{ Auth::user()->id }}です</p>
    @endauth
    <p>-----------------------------------------------------------------------------------------</p>
    <h2>三択アプリ　インデックス画面</h2>
    <p>-----------------------------------------------------------------------------------------</p>
    <div>
        <a class="btn" href="/question">三択を解く画面へ</a>
        <br />
        <a class="btn" href="/santakuset">{{ Auth::user()->name }} の三択設定へ移動する</a>
        <br />
        <a class="btn" href="/new">問題新規作成画面へ移動する</a>
        <br />
        <a class="btn" href="/list">{{ Auth::user()->name }} が作成した問題を一覧表示する</a>
        <p>-----------------------------------------------------------------------------------------</p>
        <h2>三択アプリ　問題一覧</h2>

        @foreach($santaku as $santaku1)

        <summary>
            <p>作成者 {{ $santaku1->user->name }} 問題 {{ $santaku1->question }} </p>

        </summary>
        @endforeach