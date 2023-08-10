@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/main.css')  }}">
@endsection

@section('page')
<div class="result">
  <div class="result__title">
    <h2>あなたにおすすめの金融取引はこちら！</h2>
  </div>
  <h3>{{$way['title']}}</h3>
  <p>{{ $way['description'] }}</p>
  <form action="{{ route('setting') }}" method="post">
    @csrf
    <input type="hidden" value="{{ $way['id'] }}" name="way_id">
    <button class="form__button-submit" type="submit">金融の方法を{{ $way['title'] }}として登録</button>
  </form>
</div>
<div class="posts">
  <div class="posts__title">
    <h2>{{ $way['title'] }}の例</h2>
  </div>
  <h3 class="posts__list-title">初心者にもおすすめ！</h3>
  <div class="posts__card-list">
    @foreach($difficultyPosts as $post)
    <div class="posts__card">
      <a href="">
        <div class="posts__card-title">
          <h3>{{ $post['title'] }}</h3>
          <p>{{ $post->user->type->type }}の{{ $post->user->name }}さんの場合</p>
      </div>
          <div class="posts__card-content">
          <p>期間：{{ $post['month'] }}か月</p>
          <p>金額：{{ $post['amount'] }}万円</p>
        </div>
        <div class="posts__card-forecast">
          <?php
          $result = ($post->amount / $post->month);
          $lastResult = ($user->target / $result) + 1;
          $lastResult = ceil($lastResult);
          ?>
          <p>あなたの場合、{{ $lastResult }}か月で目標達成！</p>
        </div>
      </a>
    </div>
    @endforeach
  </div>
  <h3 class="posts__list-title">最新の記事</h3>
    <div class="posts__card-list">
      @foreach($latestPosts as $post)
      <div class="posts__card">
        <a href="">
          <div class="posts__card-title">
            <h3>{{ $post['title'] }}</h3>
            <p>{{ $post->user->type->type }}の{{ $post->user->name }}さんの場合</p>
          </div>
          <div class="posts__card-content">
            <p>期間：{{ $post['month'] }}か月</p>
            <p>金額：{{ $post['amount'] }}万円</p>
          </div>
          <div class="posts__card-forecast">
            <?php
            $result = ($post->amount / $post->month);
            $lastResult = ($user->target / $result) + 1;
            $lastResult = ceil($lastResult);
            ?>
            <p>あなたの場合、{{ $lastResult }}か月で目標達成！</p>
          </div>
        </a>
      </div>
      @endforeach
    </div>
    @endsection