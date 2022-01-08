@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary card-outline rounded-lg">
                <div class="card-header text-center rounded-lg">
                    <h2 class="text-uppercase">{{ __('Register') }}</h2>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate="" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="firstname">{{ __('First name') }}</label>
                                    <input type="text" id="firstname" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" pattern="[a-zA-Z][a-zA-Z\. ]{2,}" required autocomplete="first_name" autofocus />
                                    <span class="invalid-feedback" role="alert">
                                        @if($errors->has('first_name'))
                                        {{ $errors->first('first_name') }}
                                        @else
                                        {{ __('Please enter your first name') }}
                                        @endif
                                    </span>
                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="lastname">{{ __('Last name') }}</label>
                                    <input type="text" id="lastname" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" pattern="[a-zA-Z][a-zA-Z\. ]{2,}" required autocomplete="last_name" autofocus />

                                    <span class="invalid-feedback" role="alert">
                                        @if($errors->has('last_name'))
                                        {{ $errors->first('last_name') }}
                                        @else
                                        {{ __('Please enter your last name') }}
                                        @endif
                                    </span>
                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" />

                                    <span class="invalid-feedback" role="alert">
                                        @if($errors->has('email'))
                                        {{ $errors->first('email') }}
                                        @else
                                        {{ __('Please enter a valid email address') }}
                                        @endif
                                    </span>

                                </div>


                            </div>
                            <div class="col-lg">

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="contact_number">{{ __('Contact Number') }}</label>
                                    <input type="number" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" required autocomplete="contact_number" autofocus" />

                                    <span class="invalid-feedback" role="alert">
                                        @if($errors->has('contact_number'))
                                        {{ $errors->first('contact_number') }}
                                        @else
                                        {{ __('Please enter your contact number') }}
                                        @endif
                                    </span>

                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="password">{{ __('Password') }}</label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required autocomplete="new-password" />

                                    <span class="invalid-feedback" role="alert">
                                        @if($errors->has('password'))
                                        {{ $errors->first('password') }}
                                        @else
                                        {{ __('Please enter a password with at least 8 characters, one uppercase, one lowercase and one number') }}
                                        @endif
                                    </span>

                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="confirm_password">{{ __('Confirm Password') }}</label>
                                    <input type="password" id="confirm_password" class="form-control" name="password_confirmation" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required autocomplete="new-password" />
                                    <span class="invalid-feedback" role="alert">
                                        @if($errors->has('confirm_password'))
                                        {{ $errors->first('confirm_password') }}
                                        @else
                                        {{ __('Password must match') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-check d-flex justify-content-right mt-2">
                            <p> By signing up you agree all statements in <a href="" class="text-body"> <u> Terms of service</u> </a> and <a href="" class="text-body"> <u> Privacy Policy </u> </a> </p>
                        </div> -->

                        <div class="d-flex justify-content-center mt-2">
                            <button type="submit" class="btn btn-primary btn-block btn-md">{{ __('Register') }}</button>
                        </div>

                        <p class="text-center text-muted mt-2 mb-0">Have already an account? <a href="{{ url('/login') }}" class="fw-bold text-body"><u>Login here</u></a></p>
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
<script>
    (function() {
        // validate password
        $('#password').on('keyup', function() {
            var pass = $(this).val();
            var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            if (regex.test(pass)) {
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
                $(this).siblings('.invalid-feedback').hide();
                //password must match
                comparePassword();
            } else {
                $(this).removeClass('is-valid');
                $(this).addClass('is-invalid');
                $(this).siblings('.invalid-feedback').show();
            }
        });
        // password must match
        $('#confirm_password').on('keyup', function() {
            var confirm_pass = $('#confirm_password').val();
            var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            if (regex.test(confirm_pass)) {
                comparePassword();
            }

        });

        // password must match
        function comparePassword() {
            var pass = $('#password').val();
            var confirm_pass = $('#confirm_password').val();
            if (pass == confirm_pass && pass != '' && confirm_pass != '') {
                $('#confirm_password').removeClass('is-invalid');
                $('#confirm_password').addClass('is-valid');
                $('#confirm_password').siblings('.invalid-feedback').hide();
            } else {
                $('#confirm_password').removeClass('is-valid');
                $('#confirm_password').addClass('is-invalid');
                $('#confirm_password').siblings('.invalid-feedback').show();
            }
        }

    }());
</script>
@endsection