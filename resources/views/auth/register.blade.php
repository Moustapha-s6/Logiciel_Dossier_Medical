<!DOCTYPE html>
<html lang="en">


<!-- register24:03-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('Back/assets/img/favicon.ico')}}">
    <title>E-Santé - Medical & Hospital - Admin Register</title>
    <link rel="stylesheet" type="text/css" href="{{asset('Back/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Back/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Back/assets/css/style.css')}}">
    <!--[if lt IE 9]>
        <script src="{{asset('Back/assets/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('Back/assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper  account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form method="POST" action="{{ route('register') }}" class="form-signin">
                        @csrf
                        <div class="account-logo">
                            <a href="index-2.html"><img src="{{asset('Back/assets/img/logo-dark.png')}}" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label for="name" value="{{ __('Name') }}" />Username</label>
                            <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                        <div class="form-group">
                            <label for="email" value="{{ __('Email') }}" />Email Address</label>
                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" / >
                        </div>
                        <div class="form-group">
                            <label for="password" value="{{ __('Password') }}" />Password</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" / >
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" value="{{ __('Confirm Password') }}" />Confirm Password</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" / >
                        </div>
                        <div class="form-group checkbox">
                            <label>
                                <input type="checkbox"> I have read and agree the Terms & Conditions
                            </label>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Signup</button>
                        </div>
                        <div class="text-center login-link">
                            Already have an account? <a href="./login">Login</a>
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


<!-- register24:03-->
</html>


