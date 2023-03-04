@extends('layouts.main')

@section('main')

    <h1 class="text-center mt-2">Posts</h1>
    @if(session()->has('message'))
        <div class="alert alert-success m-3">
            {{session('message')}}
        </div>
    @endif
    <div class="container">
        @foreach($posts as $post)

            <div class="text text-2 p-4">
                @can('update', $post)
                <div class="row w-50">
                    <div class="col-3">
                        <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-outline-info">Edit Post</a>
                    </div>

                    <div class="col-3">
                        <form method="post" action="/admin/posts/{{$post->id}}">
                            <input name="_method" value="delete" type="hidden">
                            @csrf
                            <input name="id" value="{{$post->id}}" type="hidden">
                            <button type="submit" class="btn btn-outline-info">Delete Post</button>
                        </form>
                    </div>
                </div>
                @endcan
                <h2 class="my-3">{{$post->title}}</h2>
                <div>
                    <p class="fs-4 text-secondary">category: {{$post->category->name}}</p>
                </div>

                    <div class="row">
                            <div class="col-1 m-1"><img src="{{$post->image->url}}" style="width:100px;"></div>
                            <div class="col m-1"><p>{{$post->text}}</p></div>
                    </div>

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
    <a class="m-4 btn btn-info" href="{{route('posts.create')}}">Create New</a>
@endsection
