<div class="posts">
  <h2 class="posts__title">{{ $title }}</h2>
  <div class="posts__card-list">
    @php $count = 0; @endphp
    @foreach($posts as $post)
    <div class="posts__card">
      <a href="/record/{{ $post->id }}">
        <div class="posts__card-title">
          <h3>{{ $post['title'] }}</h3>
          <h4>{{ $post->way->title }}</h4>
          <p>{{ $post->user->type->type }}・{{ $post->user->name }}さん</p>
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
    @php $count++; @endphp
    @if ($count % 4 === 0)
  </div>
  <div class="posts__card-list">
    @endif
    @endforeach
  </div>
</div>