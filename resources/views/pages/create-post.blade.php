@extends('layouts.main')

@section('main')
    <div class="container d-block">
        <form action="/create-post" method="post" class="m-5">
            @csrf
            <div class="form-group pb-3">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="title">Enter post title</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title">
            </div>
            <div class="form-group pb-3">
                @error('text')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>Enter text</label>
                <textarea class="form-control @error('text') is-invalid @enderror" name="text"></textarea>
            </div>

            <h3 class="mt-3">Select a category</h3>

            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @foreach($categories as $category)

            <div class="form-check">
                <input class="form-check-input" type="radio" value="{{$category->id}}" id="{{$category->name}}" name="category_id">
                <label class="form-check-label" for="{{$category->name}}">
                    {{$category->name}}
                </label>
            </div>
            @endforeach

            <h4 class="mt-3">Select tags</h4>

            @error('tags')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @foreach($tags as $tag)

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}" name="tags[]">
                    <label class="form-check-label" for="{{$tag->name}}">
                        {{$tag->name}}
                    </label>
                </div>
            @endforeach


            <button type="submit" class="btn btn-info mt-4">Create Post</button>
        </form>
    </div>
@endsection
