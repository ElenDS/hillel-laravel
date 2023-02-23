@extends('layouts.main')

@section('main')
    <h1 class="text-center">Categories</h1>
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
        @foreach($categories as $category)

            <tr class="w-4">
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>
                    <a href="/admin/categories/{{$category->id}}/edit" class="btn btn-outline-info">Edit</a>
                </td>
                <td>
                    <form method="post" action="/admin/categories/{{$category->id}}">
                        <input name="_method" value="delete" type="hidden">
                        @csrf
                        <input name="id" value="{{$category->id}}" type="hidden">
                        <button type="submit" class="btn btn-outline-info">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <a class="m-4 btn btn-info" href="{{route('categories.create')}}">Create New</a>
@endsection
