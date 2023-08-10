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
  <form action="{{ route('way.setting') }}" method="post">
    @csrf
    <input type="hidden" value="{{ $way['id'] }}" name="way_id">
    <button class="form__button-submit" type="submit">金融の方法を{{ $way['title'] }}として登録</button>
  </form>
</div>
<div class="posts">
  <div class="posts__title">
    <h2>{{ $way['title'] }}の例</h2>
  </div>
  @include('common.posts', ['posts' => $difficultyPosts, 'title' => '初心者にもおすすめ'])
  @include('common.posts', ['posts' => $latestPosts, 'title' => '最新の記録'])
  @endsection