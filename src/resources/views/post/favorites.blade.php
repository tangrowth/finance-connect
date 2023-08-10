@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/main.css')  }}">
@endsection

@section('page')
@include('common.posts', ['posts' => $posts, 'title' => '保存した記録'])
@endsection