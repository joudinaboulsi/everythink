@extends('frontend.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 no-padding">
            <div class="form-wrapper">

                <div class="about-content-text text-center">
                    <h3>Sign In</h3>
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

                            <form class="logForm m-t" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" id="login_form">
                                @csrf

                                <div class="form-group">
                                    <label>Email address</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email Address" required>
                                     @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <p><a title="Recover your forgotten password" href="{{ url('/password/reset') }}">Forgot your password? </a></p>
                                </div>

                                <button type="submit" class="btn btn-stroke thin btn-dark" value="Sign In"> Sign In </button>
                            </form>

                            <hr>

                            <a href="/register" class="btn btn-stroke dark thin">Don't have an account?</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection