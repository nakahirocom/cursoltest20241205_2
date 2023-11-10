@component('mail::message')

# 新しいユーザーが追加されました！

{{ $toUser->name }}さんこんにちは！

@component('mail::panel')
新しく{{ $newUser->name }}さんが参加しましたよ！
@endcomponent

@component('mail::button', ['url' => route('index')])
　　ホーム画面に移動する
@endcomponent

@endcomponent