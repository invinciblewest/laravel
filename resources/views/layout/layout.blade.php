<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
</head>
<body>
    @include('layout.header')

    @yield('content')

    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
</body>
</html>
