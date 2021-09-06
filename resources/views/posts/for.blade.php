@extends('layouts.app')

@section('title', 'foreach test')

@section('content')
  @foreach($posts as $key => $p)
    <div>{{ $key }}.{{ $p['title'] }}</div>
  @endforeach

  @forelse($posts as $key => $p)
    <div>{{ $key }}.{{ $p['title'] }}</div>
  @empty
    No post found
    {{-- (please notice that we don't need to put @endempty at the end) --}}
  @endforelse

  @for($i=1; $i<=10; $i++)
    <div>The current value is {{ $i }}</div>
  @endfor

  @php
    //we can put some php code in here!!
    //such as define variable, calling functions and methods
  @endphp

@endsection