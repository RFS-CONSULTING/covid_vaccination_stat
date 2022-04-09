<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Covid 19 | RFS</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" />
    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg position-sticky sticky-top navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/">
                <img src="img/rfs_logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> RFS Consulting
            </a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link text-white active" aria-current="page" href="#">première dose</a>
                  <a class="nav-link text-white" href="#">Deuxième dose</a>
                  <a class="nav-link text-white" href="#">Trosième dose</a>
                </div>
            </div>
            <span class="text-white">mise à jour le 10/01/2022</span>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <div class="copy">
            <span>Créer par : <a href="#">RFS Congo</a></span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ mix('/js/chart.js') }}"></script>
</body>
</html>