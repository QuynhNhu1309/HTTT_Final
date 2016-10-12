<!DOCTYPE html>
<html ng-app="minxApp">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Minx - @yield('title')</title>
</head>

<body>
    @include('partials.navbar-top')
    <div class="container">
        @include('partials.header')
        @yield('content')
    </div>
    @include('partials.footer')
    @include('partials.assets')
</body>

</html>