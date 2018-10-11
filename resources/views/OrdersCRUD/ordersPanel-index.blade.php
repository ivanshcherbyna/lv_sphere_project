<!DOCTYPE HTML>

<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
    <span class="sr-only">Toggle Navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
   <div class="container" style="padding-top: 7%">
       <div class="row">
           @include('OrdersCRUD.part.msg')
           @yield('content')
       </div>
   </div>

</body>

</html>
