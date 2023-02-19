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
                <td><a href="/update-tag/{{$tag->id}}">Edit</a></td>
                <td><a href="/delete-tag/{{$tag->id}}">Delete</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <a class="m-4 btn btn-info" href="/create-tag">Create New</a>
@endsection
