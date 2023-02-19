@extends('layouts.main')

@section('main')
    <h1 class="text-center">Posts</h1>
    @if(session()->has('message'))
        <div class="alert alert-success m-3">
            {{session('message')}}
        </div>
    @endif
    <div class="container">
        @foreach($posts as $post)
            <div class="text text-2 p-4">
                <a href="/update-post/{{$post->id}}" class="btn btn-outline-info btn-sm m-2">Update Post</a>
                <a href="/delete-post/{{$post->id}}" class="btn btn-outline-info btn-sm m-2">Delete Post</a>
                <h2 class="my-3">{{$post->title}}</h2>
                <div>
                    <p class="fs-4 text-secondary">category: {{$post->category->name}}</p>
                </div>
                <p class="mb-4">{{$post->text}}</p>
                <div>
                    <p>
                    @foreach($post->tags as $tag)
                            <span class="text-primary">#{{$tag->name}} </span>
                    @endforeach
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <a class="m-4 btn btn-info" href="/create-post">Create New</a>
@endsection
