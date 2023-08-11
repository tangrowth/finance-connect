@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/main.css')  }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('page')
@if (@isset($message))
<div class="message">
  <p>{{ $message }}</p>
  <a href="{{ route('check') }}" class="message__button">診断を受ける</a>
</div>
@endif
@if(@isset($errors) && count($errors) > 0)
<div class="message">
  @foreach ($errors->all() as $error)
  {{ $error }}<br>
  @endforeach
</div>
@endif
<div class="top">
  <div class="top__blocks">
    <div class="top__block-2">
      <div class="block__title">
        <h2>目標金額</h2>
      </div>
      <div class="block__content">
        <form action="{{ route('target.setting') }}" method="post" class="form__input">
          @csrf
          <label for="">目標金額：<input type="number" name="target" value="{{ $user['target'] }}">万円</label><br />
          <label for="">達成金額：<input type="number" name="achieved" value="{{ $user['achieved'] }}">万円</label><br />
          @if($user['achieved'] > 0)
          <div style="width: 80%; margin: auto;">
            <canvas id="progressChart"></canvas>
          </div>

          <script>
            var ctx = document.getElementById('progressChart').getContext('2d');
            var achieved = @json($user['achieved']);
            var target = @json($user['target']);
            var remaining = target - achieved;

            var progressChart = new Chart(ctx, {
              type: 'doughnut',
              data: {
                labels: ['達成済み', '未達成'],
                datasets: [{
                  data: [achieved, remaining],
                  backgroundColor: ['#45C6B4', '#9462dd'],
                }],
              },
              options: {
                responsive: true,
              }
            });
          </script>
          @endif
          <button class="form__button-submit" type="submit">更新する</button>
        </form>
      </div>
    </div>
    <div class="top__block-2">
      <div class="block__title">
        <h2>あなたの設定</h2>
      </div>
      <div class="block__table">
        <form action="{{ route('setting') }}" method="post">
          @csrf
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
  </div>
  <div class="top__block-1">
    <div class="block__title">
      <h2>記録をつけよう</h2>
    </div>
    <div class="block__content">
      <div class="block__content-p">
        <p>記録をつけることであなたのこれまでの頑張りを振り返ることが出来ます。また、記録は公開されるため、あなたの頑張りや編み出した方法をみんなに教えることが出来ます。</p>
      </div>
      <div class="block__content-button">
        <a href="{{ route('post.add') }}" class="form__button-submit">記録を作成する</a>
        <a href="{{ route('post.review') }}" class="form__button-click">記録を振り返る</a>
      </div>
    </div>
  </div>
</div>
@include('common.posts', ['posts' => $sameWayPosts, 'title' => 'おすすめの記録'])
@include('common.posts', ['posts' => $latestPosts, 'title' => '最新の記事'])
<div class="posts">
  <a href="{{ route('post.show') }}" class="form__button-click">もっと記録を見る</a>
</div>
@endsection