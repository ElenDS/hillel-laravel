@extends('layouts.main')

@section('main')
    <h1 class="text-center">Tags</h1>
    @if(session()->has('message'))
        <div class="alert alert-success m-3">
            {{session('message')}}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)

            <tr class="w-4">
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->name}}</td>
                <td>
                    <a href="/admin/tags/{{$tag->id}}/edit" class="btn btn-outline-info">Edit</a>
                </td>
                <td>
                    <form method="post" action="/admin/tags/{{$tag->id}}">
                        <input name="_method" value="delete" type="hidden">
                        @csrf
                        <input name="id" value="{{$tag->id}}" type="hidden">
                        <button type="submit" class="btn btn-outline-info">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <a class="m-4 btn btn-info" href="{{route('tags.create')}}">Create New</a>
@endsection
