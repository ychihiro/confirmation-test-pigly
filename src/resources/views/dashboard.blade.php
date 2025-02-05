@extends('layouts.app')

@section('title', 'ダッシュボード')

@section('head')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="stats">
        <div class="stats__item">
            <label class="stats__title">目標体重</label>
            <p class="stats__value">45.0<span class="stats__unit">kg</span></p>
        </div>
        <div class="stats__item">
            <label class="stats__title">目標まで</label>
            <p class="stats__value">-1.5<span class="stats__unit">kg</span></p>
        </div>
        <div class="stats__item">
            <label class="stats__title">最新体重</label>
            <p class="stats__value">46.5<span class="stats__unit">kg</span></p>
        </div>
    </div>

    <div class="weight-log">
        <form action="/weight-logs/search" method="get" class="weight-log__header">
            <div class="weight-log__filter">
                <div class="form__input-box">
                    <input type="date" id="start-date" name="start_date" class="form__input" value="{{request('start_date')}}">
                </div>
                <span>~</span>
                <div class="form__input-box">
                    <input type="date" id="end-date" name="end_date" class="form__input" value="{{request('end_date')}}">
                </div>
                <div class="button__actions">
                  <button class="weight-log__search-button">検索</button>
                    @if (isset($startDate) || isset($endDate))
                      <input name="reset" class="weight-log__search-button" type="submit" value="リセット"></input>
                    @endif
                </div>
            </div>
            <a href="#modal" class="button-primary weight-log__add-button">データ追加</a>
        </form>

        <div>
          @if (isset($startDate) && isset($endDate))
            <p>{{\Carbon\Carbon::parse($startDate)->format('Y年m月d日')}} <span>~</span> {{\Carbon\Carbon::parse($endDate)->format('Y年m月d日')}}の検索結果 <span>{{$weightLogCount}}件</span></p>
          @elseif (isset($startDate))
            <p>{{\Carbon\Carbon::parse($startDate)->format('Y年m月d日')}}<span>~</span>の検索結果 <span>{{$weightLogCount}}件</span></p>
          @elseif (isset($endDate))
            <p><span>~</span>{{\Carbon\Carbon::parse($endDate)->format('Y年m月d日')}}の検索結果 <span>{{$weightLogCount}}件</span></p>
          @endif
        </div>

        <table class="weight-logs__table">
            <thead class="table__header">
                <tr class="table__header-row">
                    <th class="table__header-cell table__header-cell__date">日付</th>
                    <th class="table__header-cell">体重</th>
                    <th class="table__header-cell">食事摂取量カロリー</th>
                    <th class="table__header-cell">運動時間</th>
                    <th class="table__header-cell"></th>
                </tr>
            </thead>
            <tbody class="table__body">
                @foreach($weightLogs as $weightLog)
                <tr class="table__body-row">
                    <td class="table__body-cell table__body-cell__date">{{\Carbon\Carbon::parse($weightLog->date)->format('Y/m/d')}}</td>
                    <td class="table__body-cell">{{$weightLog->weight}} kg</td>
                    <td class="table__body-cell">{{$weightLog->calorie}} kcal</td>
                    <td class="table__body-cell">{{$weightLog->exercise_time}}</td>
                    <td class="table__body-cell"><a href="/"><img src="{{ asset('images/weight-log-edit-icon.svg') }}" alt="編集アイコン"></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- {{ $weightLogs->links() }} -->
    </div>

    <!-- 登録画面 -->
    <div class="modal" id="modal">
      <a href="#!" class="modal__overlay"></a>
        <div class="modal__inner">
          <form action="/weight-logs/create" method="post" class="modal__content">
            @csrf
            <h1>Weight Log</h1>
            <div class="form__input-box">
              <label for="date" class="form__label required">日付</label>
              <input type="date" id="date" name="date" class="form__input">
            </div>
            <div class="form__input-box">
              <label for="weight" class="form__label required">体重</label>
              <div class="input-with-unit">
              <input type="text" id="weight" name="weight" class="form__input" placeholder="50.0">
              <span>kg</span>
              </div>
            </div>
            <div class="form__input-box">
              <label for="calorie" class="form__label">摂取カロリー</label>
              <div class="input-with-unit">
                <input type="number" id="calorie" name="calorie" class="form__input" placeholder="1200" min="0">
                <span>kcal</span>
              </div>
            </div>
            <div class="form__input-box">
                <label for="time" class="form__label">運動時間</label>
                <input type="time" id="time" name="time" class="form__input" value="00:00">
            </div>
            <div class="form__input-box">
                <label for="content" class="form__label">運動内容</label>
                <textarea type="text" id="content" name="content" class="form__textarea" placeholder="運動の内容を追加" rows="10"></textarea>
            </div>

            <div class="modal__actions">
              <a href="#" class="button-secondary modal__close-button">戻る</a>
              <button type="submit" class="button-primary">登録</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection