@extends('layouts.app')
@section('css')
@endsection

@section('page')
@if (Auth::check())
<p>login</p>
@endif
@endsection