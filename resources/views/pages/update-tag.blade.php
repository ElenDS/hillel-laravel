@extends('layouts.main')

@section('main')
    <form action="/update-tag/{{$tag->id}}" method="post" class="m-5">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="hidden" name="id" value="{{$tag->id}}">
        <label for="name">Enter tag name</label>
        <input id="name" type="text" name="name" value="{{$tag->name}}">
        <button type="submit" class="btn btn-info">Update Tag</button>
    </form>
@endsection
