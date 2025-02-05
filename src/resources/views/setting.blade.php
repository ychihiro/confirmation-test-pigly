@extends('layouts.app')

@section('title', '設定')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/setting.css') }}">
@endsection

@section('content')
<div class="target-weight-setting">
    <div class="content">
        <h1 class="title">目標体重設定</h1>
        <form action="" class="form">
            <div class="input-box">
                <div class="input-with-unit">
                    <input type="number" name="target_weight" id="target_weight" class="input">
                    <span>kg</span>
                </div>
            </div>

            <div class="actions">
                <button class="button-secondary">戻る</button>
                <button class="button-primary">更新</button>
            </div>
        </form>
    </div>
</div>
@endsection
