@extends('layouts.app')

@section('title', $post['title'])

@section('content')

@if ($post['is_true'])
  <div>a new post~~~</div>
@else
  <div>a old post...</div>
@endif

@unless ($post['is_true'])
  <div>old post... using unless</div>
@endunless

<h1>{{ $post['title'] }}</h1>
<p>{{ $post['content'] }}</p>

@isset($post['isset_test'])
<div>The var "isset_test" exists!</div>
@endisset

@endsection