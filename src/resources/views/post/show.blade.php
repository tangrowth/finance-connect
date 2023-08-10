@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/auth.css')  }}">
<link rel="stylesheet" href="{{ asset('/css/main.css')  }}">
@endsection

@section('page')
<div class="search">
  <div class="form__title">
    <h2>記録を探す</h2>
  </div>
  <form class="form__inner" action="{{ route('post.search') }}" method="get">
    @csrf
    <div class="form__group">
      <select id="way" name="way_id">
        <option value="">方法を選択してください</option>
        @foreach ($ways as $way)
        <option value="{{ $way['id'] }}">
          {{ $way['title'] }}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form__group">
      <input type="text" name="word" placeholder="検索ワード" value="{{ old('word') }}">
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">検索</button>
    </div>
  </form>
</div>
@include('common.posts', ['posts' => $posts, 'title' => '最新の記録'])
{{ $posts->links() }}
@endsection