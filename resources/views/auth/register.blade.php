@extends('frontend.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 no-padding">
            <div class="form-wrapper">

                <div class="about-content-text text-center">
                    <h3>Create an Account</h3>
                </div>

                <div class="my-form">
                    <div class="col-md-6 hidden-xs hidden-sm info">
                        <div id="carousel-id" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="/images/logo.png" class="img-responsive center-block" alt="">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <p>Welcome to our online shop</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 form-bg">
                        <div class="main-form">

                            <form class="form m-t" method="POST" action="{{ route('register') }}" id="register_form">
                            {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Name</label>
                                    <input title="Please enter your username (at least 3 characters)" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" minlength="3" placeholder="Enter name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>Email address</label>
                                    <input title="Please enter valid email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label>Password</label>
                                    <input minlength="5" title="Please enter your password, between 5 and 12 characters" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label>Confirm password</label>
                                    <input minlength="5" title="Please enter your password, between 5 and 12 characters" type="password" placeholder="Password confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!-- recaptcha -->
                                <div class="g-recaptcha" data-sitekey="{{env('NOCAPTCHA_SITEKEY')}}" data-size="invisible" data-callback="setResponse"></div>
                                <input type="hidden" id="captcha-response" name="captcha-response" />

                                <button type="submit" class="btn btn-stroke thin btn-dark"> Create account </button>
                            </form>

                            <hr>

                            <a href="/login" class="btn btn-stroke dark thin">Already have an account?</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection