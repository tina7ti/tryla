<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tryla</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<nav class="nav" style="box-shadow: 2px 3px 4px gray;">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Tryla</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('news.index') }}">News</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About-us</a>
        </li>
    </ul>
</nav>

<div style="margin: 5% 5%;">
    @yield('content')
</div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>