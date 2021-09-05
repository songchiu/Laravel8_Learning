@extends('layouts.app')

@section('title', $post['title'])

@section('content')

@if ($post['is_true'])
  <div>a new post~~~</div>
@else
  <div>a old post...</div>
@endif

  <h1>{{ $post['title'] }}</h1>
  <p>{{ $post['content'] }}</p>
@endsection