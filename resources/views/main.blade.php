<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meniny</title>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-4">
                <h2>Meniny</h2>
                @yield('content')
            </div>
        </div>
    </div>
    <div class="search">
        <div class="search-cont">
            <i class="bi bi-search"></i>
            <input class="form-control" id="search" type="search" placeholder="Hľadaj meno">
        </div>
    </div>
</body>

</html>
