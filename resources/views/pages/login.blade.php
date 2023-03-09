@extends('layouts.empty')
@section('main')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="/login">
                                @csrf
                                @if(session('success'))
                                    <p class="text-success">{{session('success')}}</p>
                                @endif

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                           autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-info text-white btn-block">Sign in</button>
                                </div>
                            </form>

                            <a class="bt btn-close-white" href="{{$link}}">Login FB</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
