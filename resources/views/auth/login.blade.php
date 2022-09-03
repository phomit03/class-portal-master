<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

    <title>Login</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo/favicon.png') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/logo/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-grid.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>

<body class="identity-site">

    <h1 id="site-logo"> <img src="{{ asset('uploads/logo/logo-login.png') }}" alt="ClassPortal" style="width: 380px; height: 144px"/></h1>
    <main id="wrap-main-content">

    <div class="identity-tabs">
        <a class="btn btn-secondary active" href="#">Login</a>
    </div>

    <ul class="list-social-login">

        <li class="social-login-item">
            <a class="btn btn-social-login google-login" href="#">
                <img src="{{ asset('uploads/logo/google.png') }}" alt='Login with Google account'></img>
                Sign in with @fpt.edu.vn
            </a>
        </li>
    </ul>

    <form class="indentity-form" action="{{ url('/login') }}" method="post">
        @csrf

        <div class="wrap-form-field">
            <div class="form-group group-width-icon{{ $errors->has('email') ? ' has-error' : '' }}">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" autofocus>
            </div>
            <div style="color: red; margin: 8px auto">
                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>
        </div>

        <div class="wrap-form-field">
            <div class="form-group group-width-icon{{ $errors->has('password') ? ' has-error' : '' }}">
                <i class='fa fa-lock'></i>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" autocomplete="off">
            </div>
            <div style="color: red; margin: 8px auto">
                @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>
        </div>

        <div class="wrap-form-field" style="margin: 25px auto">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: 15px;
            height: 15px;">
            <label class="form-check-label" for="flexCheckDefault" style="font-size: 16px; color: #373a3c">
               Remember Me
                <span style="margin-left: 170px"><a href="{{ route('register') }}">Sign up now?</a></span>
            </label>
        </div>

        <button class="btn btn-primary edn-btn-login" name="button" value="login">
            <i class="fa fa-btn fa-sign-in"></i>
            Log In
        </button>

        <a class="btn return-home-page text-bold" href="/" title="ClassPortal">Return to home page</a>
    </form>
</main>

<script src="{{ asset('js/jquery.slim.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://kit.fontawesome.com/26e8bb41d2.js" crossorigin="anonymous"></script>

</body>
</html>
