@extends('layouts.app')
@section('css')

@endsection

@section('page')
<div class="form">
  <div class="form__title">
    <h2>金融手段診断</h2>
  </div>
  <form class="form__inner" action="{{ route('judge') }}" method="get">
    @csrf
    <div class="form__error">
      @foreach ($errors->all() as $error)
      {{ $error }}<br>
      @endforeach
    </div>
    <p>診断をしましょう！　それぞれの質問に対して、当てはまるものを選択してください。また、数字は当てはまれば当てはまるほど高い数字を選択してください。</p>
    <div class="form__group">
      <p>高額な初期投資ができるか</p>
      <select name="answers[]" id="">
        <option value="1">1</option><!--不動産1 -->
        <option value="2">2</option><!-- 為替2 -->
        <option value="3">3</option><!-- 株式3 -->
        <option value="4">4</option><!-- 債権4 -->
        <option value="5">5</option><!-- 信託投資5 -->
      </select>
    </div>
    <div class="form__group">
      <p>利益は早く出た方がいい</p>
      <select name="answers[]" id="">
        <option value="1">1</option>
        <option value="4">2</option>
        <option value="3">3</option>
        <option value="5">4</option>
        <option value="2">5</option>
      </select>
    </div>
    <div class="form__group">
      <p>リスクが低い方がいい</p>
      <select name="answers[]" id="">
        <option value="3">1</option>
        <option value="2">2</option>
        <option value="1">3</option>
        <option value="5">4</option>
        <option value="4">5</option>
      </select>
    </div>
    <div class="form__group">
      <p>手間はかけたくない</p>
      <select name="answers[]" id="">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
    <div class="form__group">
      <p>経済に関する知識があるか</p>
      <select name="answers[]" id="">
        <option value="5">1</option><!--不動産1 -->
        <option value="4">2</option><!-- 為替2 -->
        <option value="1">3</option><!-- 株式3 -->
        <option value="3">4</option><!-- 債権4 -->
        <option value="2">5</option><!-- 信託投資5 -->
      </select>
    </div>
    <div class="form__group">
      <p>情報を積極的に調べられるか</p>
      <select name="answers[]" id="">
        <option value="5">1</option><!--不動産1 -->
        <option value="4">2</option><!-- 為替2 -->
        <option value="1">3</option><!-- 株式3 -->
        <option value="3">4</option><!-- 債権4 -->
        <option value="2">5</option><!-- 信託投資5 -->
      </select>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">診断する</button>
    </div>
  </form>
</div>
@endsection