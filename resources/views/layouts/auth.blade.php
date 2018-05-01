<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Login Page</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="{{asset('css/loginpage.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/light-bootstrap-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/pe-icon-7-stroke.css')}}">
    <script src="{{asset("js/jquery.js")}}" type="text/javascript"></script>
    <script src="{{asset("js/bootstrap.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("js/login.js")}}" type="text/javascript"></script>

    <style>
        .form-control::-webkit-input-placeholder { color: white; }  /* WebKit, Blink, Edge */
        .form-control:-moz-placeholder { color: orangered; }  /* Mozilla Firefox 4 to 18 */
        .form-control::-moz-placeholder { color: orangered; }  /* Mozilla Firefox 19+ */
        .form-control:-ms-input-placeholder { color: orangered; }  /* Internet Explorer 10-11 */
        .form-control::-ms-input-placeholder { color: orangered; }
    </style>

</head>
<body>
<div class="container">
    <div class="login-container">
        <div id="output"></div>
        <div class="avatar"><p style="margin: auto auto;">LOGO</p></div>
        <div class="form-box">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label for="email" class="col-form-label">E-Mail</label>
                <div class="form-group row">
                    <div class="col">
                        <input placeholder="Email Address" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                <div class="form-group row">
                    <div class="col">
                        <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <button class="btn btn-info btn-block login" type="submit">{{ __('Login') }}</button>
                <br><br>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </form>
        </div>
    </div>

</div>