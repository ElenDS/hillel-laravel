@extends('layouts.main')

@section('main')
    <h1 class="text-center">Categories</h1>
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
        @foreach($categories as $category)

            <tr class="w-4">
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td><a href="/update-category/?id={{$category->id}}">Edit</a></td>
                <td><a href="/delete-category/?id={{$category->id}}">Delete</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <a class="m-4 btn btn-info" href="/create-category">Create New</a>
@endsection
