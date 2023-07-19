@extends('layouts.app')

@section('content')
<div class="login">
    <div class="tittle">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2>LOG IN</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- end tittle  -->
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 offset-sm-2">
                    <div class="cards">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="col-md-8">
                                    <label for="validationCustomEmail"
                                        class="form-label">{{ __('Email Address') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroupMail"><i
                                                class="fa-solid fa-envelope"></i></span>
                                        <input type="text" id="email" class="form-control"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}"  autocomplete="email"
                                            aria-describedby="inputGroupMail" >
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label for="validationCustom03" class="form-label">{{ __('Password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroupPassword"><i
                                                class="fa-solid fa-lock"></i></span>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="current-password" aria-describedby="inputGroupPassword"
                                            >
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 ">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
