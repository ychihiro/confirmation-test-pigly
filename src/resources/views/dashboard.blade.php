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
        <form class="weight-log__header">
            <div class="weight-log__filter">
                <div class="form__input-box">
                    <input type="date" id="start-date" name="start-date" class="form__input">
                </div>
                <span>~</span>
                <div class="form__input-box">
                    <input type="date" id="end-date" name="end-date" class="form__input">
                </div>
                <button class="weight-log__search-button">検索</button>
            </div>
            <a href="#modal" class="button-primary weight-log__add-button">データ追加</a>
        </form>

        <table class="weight-logs__table">
            <thead class="table__header">
                <tr class="table__header-row">
                    <th class="table__header-cell table__header-cell__date">日付</th>
                    <th class="table__header-cell">体重</th>
                    <th class="table__header-cell">食事摂取カロリー</th>
                    <th class="table__header-cell">運動時間</th>
                    <th class="table__header-cell"></th>
                </tr>
            </thead>
            <tbody class="table__body">
                @for ($i = 0; $i < 10; $i++)
                <tr class="table__body-row">
                    <td class="table__body-cell table__body-cell__date">2024/01/01</td>
                    <td class="table__body-cell">46.5</td>
                    <td class="table__body-cell">1200kcal</td>
                    <td class="table__body-cell">00:15</td>
                    <td class="table__body-cell"><a href="/"><img src="{{ asset('images/weight-log-edit-icon.svg') }}" alt="編集アイコン"></a></td>
                </tr>
                @endfor
            </tbody>
        </table>

        {{-- {{ $weightLogs->links() }} --}}
    </div>

    <div class="modal" id="modal">
      <a href="#!" class="modal__overlay"></a>
        <div class="modal__inner">
          <form class="modal__content">
            <h1>Weight Log</h1>
            <div class="form__input-box">
              <label for="date" class="form__label required">日付</label>
              <input type="date" id="date" name="date" class="form__input">
            </div>
            <div class="form__input-box">
              <label for="weight" class="form__label required">体重</label>
              <div class="input-with-unit">
              <input type="number" id="weight" name="weight" class="form__input">
              <span>kg</span>
              </div>
            </div>
            <div class="form__input-box">
              <label for="calorie" class="form__label">摂取カロリー</label>
              <div class="input-with-unit">
                <input type="number" id="calorie" name="calorie" class="form__input">
                <span>kcal</span>
              </div>
            </div>
            <div class="form__input-box">
                <label for="time" class="form__label">運動時間</label>
                <input type="number" id="time" name="time" class="form__input">
            </div>
            <div class="form__input-box">
                <label for="activity" class="form__label">運動内容</label>
                <textarea type="text" id="activity" name="activity" class="form__textarea" placeholder="運動の内容を追加" rows="10"></textarea>
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