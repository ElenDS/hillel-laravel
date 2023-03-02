@extends('layouts.main')

@section('main')
    <div class="container mt-4">
        <div>
            <ul class="list-group">
                <li>{{$country}}</li>
                <li>{{$city}}</li>
                <li>{{$code}}</li>
            </ul>
        </div>
    </div>
@endsection
