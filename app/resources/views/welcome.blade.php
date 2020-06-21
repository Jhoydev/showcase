<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jhoseph.Dev</title>
        <link rel="icon" class="js-site-favicon" type="image/svg+xml" href="/favicon.svg">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 4vw;
                display: flex;
                justify-content: center;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                margin-bottom: 10px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            h1 {
                width: 12ch;
                animation: type 2s steps(11), blink 0.5s step-end infinite alternate;
                white-space: nowrap;
                overflow: hidden;
                border-right: 3px solid;
                font-family: 'Roboto Mono', monospace;
            }

            .content-avatar img{
                width: 200px;
                height: 200px;
                object-fit: cover;
                border-radius: 50%;
            }


            @keyframes type {
                from {
                    width: 0;
                }
            }
            @keyframes blink {
                50% {
                    border-color: transparent;
                }
            }
            .fadeIn {
                animation: fadeIn 1s;
                animation-fill-mode: both;
            }

            .wait-1s {
                animation-delay: 1s;
            }

            .wait-2s {
                animation-delay: 2s;
            }

            .wait-2-5s {
                animation-delay: 2.5s;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
            @media (max-width: 650px) {
                .links {
                    display: flex;
                    flex-direction: column;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="content-avatar fadeIn wait-2-5s">
                    <img src="https://avatars0.githubusercontent.com/u/28726329?s=460&u=58e5a667ed1d88d82bed01dfeb5223690f1c558c&v=4" alt="">
                </div>
                <div class="title m-b-md">
                    <h1>Jhoseph.Dev</h1>
                </div>
                <div class="links fadeIn wait-2s">
                    <a href="{{ url('escaparates') }}">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        Escaparates
                    </a>
                    <a href="https://laracasts.com">
                        <i class="fa fa-code" aria-hidden="true"></i>
                        Frontend
                    </a>
                    <a href="https://laravel-news.com">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        Backend
                    </a>
                    <a target="_blank" href="https://github.com/Jhoydev">
                        <i class="fa fa-github" aria-hidden="true"></i>
                        GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
