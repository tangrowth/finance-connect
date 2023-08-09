@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/auth.css')  }}">
@endsection

@section('page')
<div class="form">
  <div class="form__title">
    <h2>ログイン</h2>
  </div>
  <form class="form__inner" action="/login" method="post">
    @csrf
    <div class="form__error">
      @foreach ($errors->all() as $error)
      {{ $error }}<br>
      @endforeach
    </div>
    <div class="form__group">
      <input type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス" />
    </div>
    <div class="form__group">
      <input type="password" name="password" placeholder="パスワード" />
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">ログイン</button>
    </div>
  </form>
</div>
@endsection