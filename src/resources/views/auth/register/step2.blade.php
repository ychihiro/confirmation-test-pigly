@extends('layouts.auth')

@section('title', '新規会員登録')

@section('head')
<link rel="stylesheet" href="{{ asset('css/register/step2.css') }}">
@endsection

@section('content')
<p class="step">STEP2 体重データの入力</p>

<form action="/register/step2" method="post" class="registration__form">
    @csrf
    <div class="form__input-box">
        <label for="current_weight" class="form__label">現在の体重</label>
        <input type="text" id="current_weight" name="current_weight" class="form__input" placeholder="現在の体重を入力">
        <div class="form__error">
            @error('current_weight')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form__input-box">
        <label for="target_weight" class="form__label">目標の体重</label>
        <input type="text" id="target_weight" name="target_weight" class="form__input" placeholder="目標の体重を入力">
        <div class="form__error">
            @error('target_weight')
            {{ $message }}
            @enderror
        </div>
    </div>

    <button type="submit" class="button-primary">アカウント作成</button>
</form>

@endsection