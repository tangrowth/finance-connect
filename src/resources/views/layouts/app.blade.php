<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('/css/reset.css')  }}">
  <link rel="stylesheet" href="{{ asset('/css/app.css')  }}">
  @yield('css')
  <title>Finance Connect</title>
</head>

<body>
  <header>
    <a href="/">
      <h1 class="main__title">Finance Connect</h1>
    </a>
    <form action="" class="main__form">
      <select name="" id=""></select>
      <input type="text">
    </form>
  </header>
  <div class="main">
    <aside class="nav">
      @if (Auth::check())
      <a href="/check" class="nav__item">
        <img src="{{ asset("storage/images/note.png") }}" alt="金融の診断">
        <p>診断</p>
      </a>
      <a href="" class="nav__item">
        <img src="{{ asset("storage/images/post.png") }}" alt="投稿を作成する">
        <p>投稿</p>
      </a>
      <a href="" class="nav__item">
        <img src="{{ asset("storage/images/heart.png") }}" alt="お気に入りの投稿">
        <p>お気に入り</p>
      </a>
      <a href="{{ route('logout') }}" class="nav__item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <img src="{{ asset('storage/images/logout.png') }}" alt="ログアウト">
        ログアウト
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      @else
      <a href="/login" class="nav__item">
        <img src="{{ asset("storage/images/login.png") }}" alt="ログイン">
        <p>ログイン</p>
      </a>
      <a href="/register" class="nav__item">
        <img src="{{ asset("storage/images/register.png") }}" alt="新規登録">
        <p>新規登録</p>
      </a>
      @endif
    </aside>
    <main>
      @yield('page')
    </main>
  </div>
</body>

</html>