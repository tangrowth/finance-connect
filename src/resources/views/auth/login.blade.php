@extends('layouts.app')
@section('css')
@endsection

@section('page')
<div>
  <h2>ログイン</h2>
  <form class="form" action="/login" method="post">
    @csrf
    <div class="form__group">
      <input type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス"/>
      <div class="form__error">
      @error('email')
      {{ $message }}
      @enderror
      </div>
    </div>
    <div class="form__group">
      <input type="password" name="password" placeholder="パスワード"/>
      <div class="form__error">
      @error('password')
      {{ $message }}
      @enderror
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">ログイン</button>
    </div>
  </form>
</div>
@endsection