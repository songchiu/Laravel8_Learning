@extends('layouts.app')

@section('title', 'foreach test')

@section('content')
  @foreach($posts as $key => $p)
    @if ($loop->even)
      {{-- variable "$loop" can only be use in foreach forelse --}}
      {{-- Which means can not be used at "for" loop--}}
    @endif

    <div>{{ $key }}.{{ $p['title'] }}</div>
  @endforeach

  @forelse($posts as $key => $p)
    <div>{{ $key }}.{{ $p['title'] }}</div>
  @empty
    No post found
    {{-- (please notice that we don't need to put @endempty at the end) --}}
  @endforelse

  {{-- We can use "each" to alternate "forelse"--}}
  {{-- e.g. @each('view.name', $jobs, 'job', 'view.empty') --}}
  {{-- the forth parameter is for the empty case (like forelse's empty)--}}
  {{-- But please notice that @each do not inherit the variables from the parent view--}}
  {{-- we should use the @foreach and @include directives instead--}}

  @for($i=1; $i<=10; $i++)
    <div>The current value is {{ $i }}</div>
  @endfor

  @php
    //we can put some raw php code in here!!
    //such as define variable, calling functions and methods
  @endphp

@endsection