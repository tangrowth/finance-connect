@extends('layouts.app')
@section('css')
@endsection

@section('page')
<div>
  <h2>会員登録</h2>
  <form class="form" action="/register" method="post">
    @csrf
    <div class="form__group">
      <input type="text" name="name" value="{{ old('name') }}" placeholder="名前" />
      <div class="form__error">
        @error('name')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="form__group">
      <input type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス" />
      <div class="form__error">
        @error('email')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="form__group">
      <input type="password" name="password" placeholder="パスワード" />
      <div class="form__error">
        @error('password')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="form__group">
          <input type="password" name="password_confirmation" />
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">登録</button>
    </div>
  </form>
</div>
@endsection