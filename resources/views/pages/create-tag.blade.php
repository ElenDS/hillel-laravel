@extends('layouts.main')

@section('main')
    <form action="/admin/tags" method="post" class="m-5">
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
        <label for="name">Enter category name</label>
        <input id="name" type="text" name="name">
        <button type="submit" class="btn btn-info">Create Tag</button>
    </form>
@endsection
