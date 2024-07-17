@extends('layouts.auth')

@section('title', 'ログイン')

@section('head')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<form action="/login" method="post" class="login__form">
    @csrf
    <div class="form__input-box">
        <label for="email" class="form__label">メールアドレス</label>
        <input type="text" id="email" name="email" class="form__input" placeholder="メールアドレスを入力">
        <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form__input-box">
        <label for="password" class="form__label">パスワード</label>
        <input type="text" id="password" name="password" class="form__input" placeholder="パスワードを入力">
        <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
        </div>
    </div>

    <button type="submit" class="button-primary">ログイン</button>
</form>

<a href="/register">アカウント作成はこちら</a>
@endsection