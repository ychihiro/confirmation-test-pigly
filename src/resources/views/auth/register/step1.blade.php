@extends('layouts.auth')

@section('title', '新規会員登録')

@section('head')
<link rel="stylesheet" href="{{ asset('css/register/step1.css') }}">
@endsection

@section('content')
<p class="step">STEP1 ユーザー情報</p>

<form action="/register" method="post" class="registration__form">
    @csrf
    <div class="form__input-box">
        <label for="name" class="form__label">お名前</label>
        <input type="text" id="name" name="name" class="form__input" placeholder="名前を入力">
        <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
        </div>
    </div>
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

    <button type="submit" class="button-primary">次に進む</button>
</form>

<a href="/login">ログインはこちら</a>
@endsection