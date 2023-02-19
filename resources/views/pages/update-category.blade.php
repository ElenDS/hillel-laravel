@extends('layouts.main')

@section('main')
    <form action="/update-category/{{$category->id}}" method="post" class="m-5">
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
        <input type="hidden" name="id" value="{{$category->id}}">
        <label for="name">Enter category name</label>
        <input id="name" type="text" name="name" value="{{$category->name}}">
        <button type="submit" class="btn btn-info">Update Category</button>
    </form>
@endsection
