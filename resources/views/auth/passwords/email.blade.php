@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-primary card-outline rounded-lg">
                <div class="card-header text-center rounded-lg">
                    <h2 class="text-uppercase mb-0" id="">{{ __('Reset Password') }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection