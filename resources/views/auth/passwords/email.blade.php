@extends('frontend.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 no-padding">
            <div class="form-wrapper">

                <div class="about-content-text text-center">
                    <h3>Forgot your Password</h3>
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

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <p> To reset your password, enter the email address you use to sign in to the website.</p>
                            
                            <form role="form" method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}" id="pass_reset"> 
                                {{ csrf_field() }}   
                                <div class="form-group w30">
                                    <label for="email"> Email address </label>
                                    <input id="email" name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"  value="{{ old('email') }}" placeholder="Enter email" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-stroke btn-dark thin">Retrieve Password </button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection