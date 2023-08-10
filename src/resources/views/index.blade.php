@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/main.css')  }}">
@endsection

@section('page')
@if (@isset($message))
<div class="message">
  <p>{{ $message }}</p>
  <a href="{{ route('check') }}" class="message__button">診断を受ける</a>
</div>
@endif
<div class="top">
  <div class="top__block-1">
    <div class="block__title">
      <h2>目標金額</h2>
    </div>
    <div class="block__content">
      <p>{{ $user['target'] }}万円</p>
      <p>利益：　{{ $user['target'] }}万円</p>
      <p>達成状況：　％</p>
    </div>
  </div>
  <div class="top__block-2">
    <div class="block__title">
      <h2>あなたの設定</h2>
    </div>
    <div class="block__table">
      <form action="{{ route('setting') }}" method="post">
        @csrf
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
        <table>
          <tr>
            <th>名前</th>
            <td><input type="text" value="{{ $user['name'] }}" name="name"></td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td><input type="text" value="{{ $user['email'] }}" name="email"></td>
          </tr>
          <tr>
            <th>職業</th>
            <td>
              <select name="type_id">
                @foreach($types as $type)
                @if ($type['id'] == $user['type_id'])
                <option value="{{ $type['id'] }}" selected>{{ $type['type'] }}</option>
                @else
                <option value="{{ $type['id'] }}">{{ $type['type'] }}</option>
                @endif
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <th>方法</th>
            <td>
              @if(isset($user->way_id))
              <select name="way_id">
                @foreach($ways as $way)
                @if ($way['id'] == $user['way_id'])
                <option value="{{ $way['id'] }}" selected>{{ $way['title'] }}</option>
                @else
                <option value="{{ $way['id'] }}">{{ $way['title'] }}</option>
                @endif
                @endforeach
              </select>
              @else
              未設定
              @endif
            </td>
          </tr>
        </table>
        <button class="form__button-submit" type="submit">更新する</button>
      </form>
    </div>
  </div>
  <div class="top__block-3">
    <div class="block__title">
      <h2>記録をつけよう</h2>
    </div>
    <div class="block__content">
      <div class="block__content-p">
        <p>記録をつけることであなたのこれまでの頑張りを振り返ることが出来ます。また、記録は公開されるため、あなたの頑張りや編み出した方法をみんなに教えることが出来ます。</p>
      </div>
      <div class="block__content-button">
        <a href="/record/add" class="form__button-submit">記録を作成する</a>
        <a href="/record/user" class="form__button-click">記録を振り返る</a>
      </div>
    </div>
  </div>
</div>
<div class="posts">
  <h2 class="posts__title">最新の記事</h2>
  <div class="posts__card-list">
    @foreach($posts as $post)
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
</div>
@endsection