@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-primary card-outline rounded-lg">
                <div class="card-header text-center rounded-lg">
                    <h2 class="text-uppercase mb-0" id="">{{ __('Confirm Password') }}</h2>
                </div>
                <div class="card-body"> {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="d-flex justify-content-center  ">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Confirm Password') }}
                            </button>

                        </div>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link pl-0" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection