<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Covid 19 | RFS</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" />
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <div class="logo-img">
                    <img src="img/rfs_logo.png" alt="">
                </div>
                <div class="logo-text">
                    <a href="">RFS Covid-19 app</a>
                </div>
            </div>
            <ul class="menu">
                <li class="menu-item">
                    <a href="#">provinces</a>
                </li>
                <li class="menu-item menu-item-maj-info">
                    <span>Dernière mise à jour</span>
                    <span class="btn btn-blue">Janvier 2022</span>
                </li>
            </ul>
        </nav>
    </header>
    @yield('content')
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
