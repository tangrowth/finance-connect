@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/card.css')  }}">
@endsection

@section('page')
<div class="card">
  <div class="card__title">
    <h3>{{ $post['title'] }}</h3>
  </div>
  <div class="card__content">
    <p>{{ $post['content'] }}</p>
  </div>
  <div class="card__info">
    <div class="card__info-box">
      <p>期間：{{ $post['month'] }}か月</p>
      <p>金額：{{ $post['amount'] }}万円</p>
    </div>
    <div class="card__info-box">
      <p>{{ $post->user->name }}</p>
      <p>作成日：{{ $post['created_at'] }}</p>
    </div>
  </div>
  <div class="card__footer">
    @if(isset($favorite) && $favorite !== null)
    <form action="{{ route('favorite.off') }}" method="post">
    @csrf
      <input type="hidden" name="id" value="{{ $favorite['id'] }}">
      <button class="heart__btn"><img <img src="{{ asset("storage/images/heart_off.png") }}" alt=""></button>
    </form>
    @else
    <form action=" {{ route('favorite.on') }}" method="post">
      @csrf
      <input type="hidden" name="post_id" value="{{ $post['id'] }}">
      <input type="hidden" name="user_id" value="{{ $user['id'] }}">
      <button class="heart__btn"><img <img src="{{ asset("storage/images/heart_on.png") }}"" alt=""></button>
    </form>
    @endif
    <p>{{ $count }}</p>
  </div>
</div>
@endsection