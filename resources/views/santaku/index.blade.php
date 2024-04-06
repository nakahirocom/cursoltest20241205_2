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
    <div>
        @if (Route::has('login'))
        <div class="fixed top-0 right-0 px-6 py-4">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        @auth
        <div class="container mx-auto my-4">
            <p class="text-2xl text-center">三択アプリ</p>
            <nav>
                <ol>
                    <li class="breadcrumb-item"><span>{{ Auth::user()->name }}</span> がログイン中</li>
                    <li class="breadcrumb-item active" aria-current="page">ユーザーid{{ Auth::user()->id }}</li>
                    連続{{ Auth::user()->continuous_correct_answers }}問正解中
                </ol>
            </nav>
        </div>
        @endauth

        <div class="mx-auto my-4">
            <ul>
                <li class="mb-2">
                    <a href="/santakuset"
                        class="border border-gray-800 text-gray-800 hover:bg-gray-800 hover:text-white px-3 py-2 rounded-lg text-center">出題ジャンルの選択を行う</a>
                </li>
                <li class="mb-2">
                    <a href="/question"
                        class="border border-gray-800 text-gray-800 hover:bg-gray-800 hover:text-white px-3 py-2 rounded-lg text-center">1.選んだジャンルを解きまくる</a>
                </li>
                <li class="mb-2">
                    <a href="/incorrect"
                        class="border border-gray-800 text-gray-800 hover:bg-gray-800 hover:text-white px-3 py-2 rounded-lg text-center">2.最近間違えた問題を確認する</a>
                </li>
            </ul>
        </div>

        <div class="container mx-auto my-1">
            <div class="flex flex-col">
                @foreach ($users as $index => $user)
                <div
                    class="{{ $user->id == $currentUser ? 'bg-blue-300 border-blue-500' : 'bg-white border-gray-200' }} flex items-center justify-between border-b p-1 mb-1">
                    <span class="text-lg font-semibold">{{ $loop->iteration }}位</span>
                    <div class="flex items-center">
                        <div class="text-sm font-semibold text-gray-800 mr-3">名前: {{ $user->name }}</div>
                        <div class="text-sm text-gray-600">連続正解数: {{ $user->continuous_correct_answers }}</div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</body>