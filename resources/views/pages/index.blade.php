@extends('layouts.main')

@section('main')
    <section class="h-100 d-flex mt-5 justify-content-center">
    <form>

        <div class="form-outline">
            <input type="email" id="form2Example1" class="form-control" />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <button type="button" class="btn btn-info btn-block mb-4">Sign in</button>

    </form>
    </section>
@endsection
