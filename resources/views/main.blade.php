<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Meniny</title>

    </head>
    <body>
        <h2>Meniny</h2>

        @yield('content')
    </body>
</html>
