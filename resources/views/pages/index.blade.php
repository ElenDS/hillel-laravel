@extends('layouts.main')

@section('main')
    <body style="background-color: #4d828c;">
    <div class="text-center my-0 py-0">
        <a class="mb-0 text-secondary text-decoration-none" href="{{route('posts.index')}}"><h1 class="mb-0 py-5 bg-light bg-gradient border-bottom">Posts</h1></a>
        <a class="mb-0 text-secondary text-decoration-none" href="{{route('categories.index')}}"><h1 class="mb-0 py-5 bg-light bg-gradient border-bottom">Categories</h1></a>
        <a class="mb-0 text-secondary text-decoration-none" href="{{route('tags.index')}}"><h1 class="mb-0 py-5 bg-light bg-gradient border-bottom">Tags</h1></a>
    </div>
    </body>
@endsection
