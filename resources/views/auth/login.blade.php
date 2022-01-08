@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-primary card-outline rounded-lg">
                <div class="card-header text-center rounded-lg">
                    <h2 class="text-uppercase">{{ __('Login') }}</h2>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate="" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" />
                            <div class="invalid-feedback">
                                @if($errors->has('email'))
                                {{ $errors->first('email') }}
                                @else
                                {{ __('Please enter a valid email address') }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                            <div class="invalid-feedback">
                                Password is required
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <input   type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary  btn-block btn-md">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link pl-0" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                        <p class="text-center text-muted m-1">Don't have an account? <a href="{{ url('/register') }}" class="fw-bold text-body"><u>Register here</u></a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pluginsjs')
<script src="{{ asset('AdminLTE-3.1.0/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/jquery-validation/additional-methods.min.js') }}"></script>
@endsection

@section('js')
<script src="{{asset('js/jquery-validation.js')}}"></script>
@endsection