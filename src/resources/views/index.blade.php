@extends('layouts.app')
@section('css')
@endsection

@section('page')
@if (@isset($message))
<div class="message">
  <p>{{ $message }}</p>
  <a href="{{ route('check') }}" class="message__button">診断を受ける</a>
</div>
@endif
<div class="main">
  <div class="main__block">
    <h2>目標金額</h2>
    <p>{{ $user->target }}万円</p>
  </div>
  <div class="main__block">
    <h2>あなたの設定</h2>
    <table>
      <tr>
        <th>名前</th>
        <td>{{ $user->name }}</td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{ $user->email }}</td>
      </tr>
      <tr>
        <th>職業</th>
        <td>{{ $user->type->type }}</td>
      </tr>
      <tr>
        <th>方法</th>
        @if(@isset($user->way_id))
        <td>{{ $user->way->title }}</td>
        @else
        <td>未設定</td>
        @endif
      </tr>
    </table>
  </div>
</div>
@endsection