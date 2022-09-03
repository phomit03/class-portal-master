<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

    <title>Registration</title>

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
        <a class="btn btn-secondary active" href="#">Register</a>
    </div>

    <form class="indentity-form" action="{{ url('/register') }}" method="post">
        @csrf
        <!--first-name-->
        <div class="wrap-form-field">
            <div class="form-group group-width-icon{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <i class='fa fa-user'></i>
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" autofocus>
            </div>
            <div style="color: red; margin: 8px auto">
                @if ($errors->has('first_name'))
                    <span class="help-block"><strong>{{ $errors->first('first_name') }}</span>
                @endif
            </div>
        </div>

        <!--last-name-->
        <div class="wrap-form-field">
            <div class="form-group group-width-icon{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <i class='fa fa-user'></i>
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
            </div>
            <div style="color: red; margin: 8px auto">
                @if ($errors->has('last_name'))
                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</span>
                @endif
            </div>
        </div>

        <!--email-->
        <div class="wrap-form-field">
            <div class="form-group group-width-icon{{ $errors->has('email') ? ' has-error' : '' }}">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <div style="color: red; margin: 8px auto">
                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <!--password-->
        <div class="wrap-form-field">
            <div class="form-group group-width-icon{{ $errors->has('password') ? ' has-error' : '' }}">
                <i class='fa fa-lock'></i>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password">
            </div>
            <div style="color: red; margin: 8px auto">
                @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>

        <!--password re-type-->
        <div class="wrap-form-field">
            <div class="form-group group-width-icon{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <i class='fa fa-lock'></i>
                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password">
                <div style="color: red">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="wrap-form-field" style="margin: 25px auto">
            <label style="font-size: 16px; color: #373a3c;">
                <span>Are you already a member? <a href="{{ route('login') }}">Login</a></span>
            </label>
        </div>

        <button class="btn btn-primary edn-btn-login" name="button" value="login">
            <i class="fa fa-btn fa-sign-in"></i>
            Register
        </button>

        <a class="btn return-home-page text-bold" href="/" title="ClassPortal">Return to home page</a>
    </form>
</main>

<script src="{{ asset('js/jquery.slim.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://kit.fontawesome.com/26e8bb41d2.js" crossorigin="anonymous"></script>

</body>
</html>

