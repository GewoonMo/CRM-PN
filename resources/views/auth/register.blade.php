@extends('layouts.login')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>
                    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <span class="login100-form-title">
                    CRM Register
                </span>
                        <div class="wrap-input100 validate-input">
                            <input class="input100 @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                              <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input  class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Confirm password is required">
                            <input id="password-confirm" type="password" class="input100" name="password_confirmation" placeholder="Repeat password" required autocomplete="new-password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>

                        <div class="row mb-0">

                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="text-center p-t-12">
                    <span class="txt1">
                        You accept the terms of use and privacy policy of our website by registering.
{{--                        <a href="/terms">Terms of use</a> and <a href="/privacy">Privacy policy</a>--}}
                    </span>
                        </div>
                        <div class="text-center p-t-136">
                            <a class="txt2" href="/login">
                                Already have an account?
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
{{--        </div>--}}
    </div>
</div>
@endsection
