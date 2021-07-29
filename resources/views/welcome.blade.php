<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Compeer</title>
        <link rel="stylesheet" href="./css/welcome.css">
       

    </head>
    <body class="container">
        <div class="welcomeLogo">
            <img src="./img/Compeer1.png" class="welcomeLogo" alt="Compeer Logo">
        </div>
            @if (Route::has('login'))
                <div class="welcomeButtons">
                    @auth
                        <a href="{{ url('/home') }}" class="homeButton">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="loginButton">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="registerButton">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            
      
    </body>
</html>
