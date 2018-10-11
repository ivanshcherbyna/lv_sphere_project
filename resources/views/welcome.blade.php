<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/custom.css" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #9e9e9e;
                color: #effaff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body >
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Домой</a>
                        <a href="{{url('/clients-panel/')}}">Клиенты</a>
                        <a href="{{url('/orders-panel/')}}">Сделки</a>
                    @else
                        <a href="{{ url('/login') }}">Авторизироваться</a>
                        <a href="{{ url('/register') }}">Регистрация</a>
                    @endif
                </div>
            @endif

            <div class="form-wrapper ">
                <div>
                   <img class="logo content flex-center" src="/img/logo.png" alt=" S P H E R E &trade;" width="350px">
                </div>

                <div class="links">
                    <a href="#">Новости</a>
                    <a href="https://www.facebook.com/SferaOkonZP">Facebook</a>
                    <a href="#">О компании</a>
                    <a href="mailto:sferaokon.zp@gmail.com">Написать письмо</a>
                </div>
            </div>
        </div>
    </body>
</html>
