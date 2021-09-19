@extends('layouts.app')

@section('title', 'Update the post')

@section('content')

{{-- "route('crud.update')" is calling the route's name --}}
<form action="{{ route('crud.update', ['crud' => $post->id]) }}" method="POST">
    @csrf
    
    @method('PUT')
    @include('posts.form')
    <div><input type="submit" value="Update"></div>

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