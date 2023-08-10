@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/main.css')  }}">
@endsection

@section('page')
<div class="form">
  <div class="form__title">
    <h2>金融手段診断</h2>
  </div>
  <form class="form__inner" action="{{ route('judge') }}" method="get">
    @csrf
    <p>あなたにぴったりの金融の手段を診断をしましょう！　それぞれの質問に対して、当てはまるものを選択してください。</p>
    <div class="form__error">
      @foreach ($errors->all() as $error)
      {{ $error }}<br>
      @endforeach
    </div>
    <div class="form__group">
      <p><span>Q1</span>高額な初期投資ができるか</p>
      <div class="form__group-radio">
        <label class="form__group-label"><input type="radio" value="1" name="answers[1]">いいえ</label>
        <label class="form__group-label"><input type="radio" value="2" name="answers[1]">どちらかと言うといいえ</label>
        <label class="form__group-label"><input type="radio" value="3" name="answers[1]" checked>ふつう</label>
        <label class="form__group-label"><input type="radio" value="4" name="answers[1]">どちらかと言うとはい</label>
        <label class="form__group-label"><input type="radio" value="5" name="answers[1]">はい</label>
      </div>
    </div>
    <div class="form__group">
      <p><span>Q2</span>利益は早く出た方がいい</p>
      <div class="form__group-radio">
        <label class="form__group-label"><input type="radio" value="1" name="answers[2]">いいえ</label>
        <label class="form__group-label"><input type="radio" value="4" name="answers[2]">どちらかと言うといいえ</label>
        <label class="form__group-label"><input type="radio" value="3" name="answers[2]" checked>ふつう</label>
        <label class="form__group-label"><input type="radio" value="5" name="answers[2]">どちらかと言うとはい</label>
        <label class="form__group-label"><input type="radio" value="2" name="answers[2]">はい</label>
      </div>
    </div>
    <div class="form__group">
      <p><span>Q3</span>リスクが低い方がいい</p>
      <div class="form__group-radio">
        <label class="form__group-label"><input type="radio" value="3" name="answers[3]">いいえ</label>
        <label class="form__group-label"><input type="radio" value="2" name="answers[3]">どちらかと言うといいえ</label>
        <label class="form__group-label"><input type="radio" value="1" name="answers[3]" checked>ふつう</label>
        <label class="form__group-label"><input type="radio" value="4" name="answers[3]">どちらかと言うとはい</label>
        <label class="form__group-label"><input type="radio" value="5" name="answers[3]">はい</label>
      </div>
    </div>
    <div class="form__group">
      <p><span>Q4</span>手間はかけたくない</p>
      <div class="form__group-radio">
        <label class="form__group-label"><input type="radio" value="1" name="answers[4]">いいえ</label>
        <label class="form__group-label"><input type="radio" value="2" name="answers[4]">どちらかと言うといいえ</label>
        <label class="form__group-label"><input type="radio" value="3" name="answers[4]" checked>ふつう</label>
        <label class="form__group-label"><input type="radio" value="4" name="answers[4]">どちらかと言うとはい</label>
        <label class="form__group-label"><input type="radio" value="5" name="answers[4]">はい</label>
      </div>
    </div>
    <div class="form__group">
      <p><span>Q5</span>経済に関する知識があるか</p>
      <div class="form__group-radio">
        <label class="form__group-label"><input type="radio" value="5" name="answers[5]">いいえ</label>
        <label class="form__group-label"><input type="radio" value="4" name="answers[5]">どちらかと言うといいえ</label>
        <label class="form__group-label"><input type="radio" value="1" name="answers[5]" checked>ふつう</label>
        <label class="form__group-label"><input type="radio" value="3" name="answers[5]">どちらかと言うとはい</label>
        <label class="form__group-label"><input type="radio" value="2" name="answers[5]">はい</label>
      </div>
    </div>
    <div class="form__group">
      <p><span>Q6</span>情報を積極的に調べられるか</p>
      <div class="form__group-radio">
        <label class="form__group-label"><input type="radio" value="5" name="answers[6]">いいえ</label>
        <label class="form__group-label"><input type="radio" value="4" name="answers[6]">どちらかと言うといいえ</label>
        <label class="form__group-label"><input type="radio" value="1" name="answers[6]" checked>ふつう</label>
        <label class="form__group-label"><input type="radio" value="3" name="answers[6]">どちらかと言うとはい</label>
        <label class="form__group-label"><input type="radio" value="2" name="answers[6]">はい</label>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">診断する</button>
    </div>
  </form>
</div>
@endsection