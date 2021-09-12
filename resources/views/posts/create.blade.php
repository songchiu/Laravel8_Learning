@extends('layouts.app')

@section('title', 'Create the post')

@section('content')

{{-- "route('crud.store')" is calling the route's name --}}
<form action="{{ route('crud.store') }}" method="POST">
    <div><input type="text" name="title"></div>
    <div><textarea name="content"></textarea></div>
    <div><input type="submit" value="Create"></div>
</form>

@endsection