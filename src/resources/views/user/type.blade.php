@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/auth.css')  }}">
@endsection

@section('page')
<div class="form">
  <div class="form__title">
    <h2>基本の登録</h2>
  </div>
  <form class="form__inner" action="{{ route('setting') }}" method="post">
    @csrf
    <p>まずは情報を登録しましょう！<br />あなたの職業と金融の目標金額を設定しましょう。</p>
    <div class="form__error">
      @foreach ($errors->all() as $error)
      {{ $error }}<br>
      @endforeach
    </div>
    <div class="form__group">
      <select id="type" name="type_id">
        @foreach ($types as $type)
        <option value="{{ $type['id'] }}">
          {{ $type['type'] }}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form__group">
      <input type="number" name="target" placeholder="目標金額" value="{{ old('target') }}">
      <p class="form__group-unit">万円</p>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">登録</button>
    </div>
  </form>
</div>
@endsection