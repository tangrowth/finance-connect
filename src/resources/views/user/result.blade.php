@extends('layouts.app')
@section('css')
@endsection

@section('page')
<div class="result">
  <div class="result__title">
    <h2>あなたにおすすめの金融取引はこちら！</h2>
  </div>
  <p>{{$way['title']}}</p>
</div>
<div class="posts">
  <div class="posts__title">
    <h2>{{ $way['title'] }}の例</h2>
  </div>
  @foreach($posts as $post)
  <a href="">
    < class="posts__card">
      <div class="posts__card-title">
        <h3>{{ $post['title'] }}</h3>
      </div>
      <div class="posts__card-content">
        <p>{{ $post->user->type->type }}</p>
        <div class="posts__card-forecast">
          <p>期間：{{ $post['month'] }}か月</p>
          <p>金額：{{ $post['amount'] }}万円</p>
          <?php
          $result = ($post->amount / $post->month);
          $lastResult = ($user->target / $result);
          $lastResult = ceil($lastResult);
          ?>
          <p>あなたの場合、{{ $lastResult }}か月で目標達成！</p>
        </div>
      </div>
  </a>
  @endforeach
</div>
<div>
  <form action="{{ route('setting') }}" method="post">
    @csrf
    <input type="hidden" value="{{ $way['id'] }}" name="way_id">
    <button class="form__button-submit" type="submit">金融の方法を{{ $way['title'] }}として登録</button>
  </form>
</div>
@endsection