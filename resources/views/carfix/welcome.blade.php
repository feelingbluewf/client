<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Carfix</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <style>
        .spacing { 
            word-spacing: 9999px;
        }

        .title {
            font-weight: 600; 
            font-size: 56px;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <div class="col-md-12 text-center text-uppercase spacing">
            <span class="title">Welcome to carfix!</span>
        </div>
        <div class="col-md-12 mt-5 text-center text-uppercase spacing">
            @if (Route::has('login'))
            @auth
            <h3><a href="{{ url('/orders') }}" class="">Home</a></h3>
            @else
            <h3>
                <a href="{{ route('login') }}" class="">Login</a>
            </h3>
            <h3>or</h3>
            <h3>
                <a href="{{ route('register') }}" class="">Register</a>
            </h3>
            @endif
            @endif
        </div>
        <div class="col-md-12 mb-5 text-center fixed-bottom">
            <h5>
                <a href="#">Privacy Policy</a>
            </h5>
        </div>
    </div>
</body>
</html>
