@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/auth.css')  }}">
@endsection

@section('page')
<div class="form">
  <div class="form__title">
    <h2>会員登録</h2>
  </div>
  <form class="form__inner" action="/register" method="post">
    @csrf
    <div class="form__error">
      @foreach ($errors->all() as $error)
      {{ $error }}<br>
      @endforeach
    </div>
    <div class="form__group">
      <input type="text" name="name" value="{{ old('name') }}" placeholder="名前" />
    </div>
    <div class="form__group">
      <input type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス" />
    </div>
    <div class="form__group">
      <input type="password" name="password" placeholder="パスワード" />
    </div>
    <div class="form__group">
      <input type="password" name="password_confirmation" placeholder="確認用パスワード" />
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">登録</button>
    </div>
  </form>
</div>
@endsection