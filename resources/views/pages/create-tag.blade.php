@extends('layouts.main')

@section('main')
    <form action="/create-tag" method="post" class="m-5">
        @csrf
        <label for="name">Enter category name</label>
        <input id="name" type="text" name="name">
        <button type="submit" class="btn btn-info">Create Tag</button>
    </form>
@endsection
