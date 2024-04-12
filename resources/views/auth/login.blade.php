<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('Back/assets/img/favicon.ico')}}">
    <title>E-Santé - Medical & Hospital - Admin login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('Back/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Back/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Back/assets/css/style.css')}}">
    <!--[if lt IE 9]>
        <script src="{{asset('Back/assets/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('Back/assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" class="form-signin">
                        @csrf
                        <div class="account-logo">
                            <a href="index-2.html"><img src="{{asset('Back/assets/img/logo-dark.png')}}" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label for="email" value="{{ __('Email') }}" />Username or Email</label>
                            <input id="email" type="email" name="email" :value="old('email')" class="form-control" required autofocus autocomplete="username" / >
                        </div>
                        <div class="form-group">
                            <label for="password" value="{{ __('Password') }}" />Password</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" / >
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="./register">Register Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('Back/assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('Back/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('Back/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Back/assets/js/app.js')}}"></script>
</body>


<!-- login23:12-->
</html>



