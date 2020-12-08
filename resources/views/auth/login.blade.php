@extends('layouts.app')

@section('content')
    <div class=" d-flex justify-content-center" >
        <div class="row pt-3">
            <div class="col-md-12 align-self-center">
                <br>
                <h1 class="display-3 d-flex justify-content-center"><em>Welcome to</em></h1>
                <h1 class="display-3 d-flex justify-content-center"><em>vqManager!</em></h1>
                <br>
                <br>
                    <div class="card-body shadow p-3 mb-5 bg-white rounded p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1" class=" d-flex justify-content-center">{{ __('E-Mail Address') }}</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class=" d-flex justify-content-center">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-lg btn-block">{{ __('Login') }}</button>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <a href="{{ route('register') }}"> Don't have an account? </a>
                            </div>

                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection







