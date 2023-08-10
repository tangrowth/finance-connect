@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/auth.css')  }}">
@endsection

@section('page')
<div class="form">
  <div class="form__title">
    <h2>記録の作成</h2>
  </div>
  <form class="form__inner" action="{{ route('post.submit') }}" method="post">
    @csrf
    <p>あなたの頑張りを記録しましょう！<br />達成金額とかかった時間、方法や振り返りをまとめてください。</p>
    <div class="form__error">
      @foreach ($errors->all() as $error)
      {{ $error }}<br>
      @endforeach
    </div>
    <div class="form__group">
      <select id="type" name="way_id">
        @foreach ($ways as $way)
        <option value="{{ $way['id'] }}">
          {{ $way['title'] }}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form__group">
      <input type="number" name="month" placeholder="達成までの時間" value="{{ old('month') }}">
      <p class="form__group-unit">ヶ月</p>
    </div>
    <div class="form__group">
      <input type="number" name="amount" placeholder="達成金額" value="{{ old('amount') }}">
      <p class="form__group-unit">万円</p>
    </div>
    <div class="form__group">
      <select name="difficulty" id="">
        <option value="1">とても簡単</option>
        <option value="2">簡単</option>
        <option value="3">普通</option>
        <option value="4">少し大変</option>
        <option value="5">とても大変</option>
      </select>
    </div>
    <div class="form__group">
      <input type="text" name="title" placeholder="タイトル" value="{{ old('title') }}">
    </div>
    <div class="form__group">
      <textarea name="content" id="" cols="30" rows="10" placeholder="本文"></textarea>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">登録</button>
    </div>
    <input type="hidden" name="user_id" value="{{ $user->id }}">
  </form>
</div>
@endsection