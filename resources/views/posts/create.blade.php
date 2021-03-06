@extends('layouts.app')

@section('title', 'Create the post')

@section('content')

{{-- "route('crud.store')" is calling the route's name --}}
<form action="{{ route('crud.store') }}" method="POST">
    @csrf
    
    @include('posts.form')
    <div><input type="submit" value="Create"></div>

    @if($errors->any())
        {{-- display all the error of the form --}}
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>

@endsection