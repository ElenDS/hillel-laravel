@extends('layouts.main')

@section('main')
    <form action="/admin/tags/{{$tag->id}}" method="post" class="m-5">
        <input name="_method" value="put" type="hidden">
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
