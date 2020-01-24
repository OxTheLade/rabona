<!DOCTYPE html>
<html lang="dk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="fb:app_id" content="712150002641494" />
    <script src="https://kit.fontawesome.com/6e0b74ce89.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <title>Rabona.dk | Få de seneste nyheder!</title>
</head>

<body>
<nav id="navbar" class="navbar navbar-expand-sm navbar-dark bg-black">
    <div class="container">
        <a href="{{route('index')}}"><img src="{{asset('img/rabona%20logo.png')}}" alt="" class="nav-brand img-fluid rounded rounded-circle"
                                  height="100" width="100"></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
                    <a href="{{route('index')}}" class="nav-link">Forside</a>
                </li>
                <li class="nav-item {{request()->is('nyheder') ? 'active' : ''}}">
                    <a href="#" class="nav-link">Nyheder</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->is('liga-tabeller') ? 'active' : ''}}">Liga Tabeller</a>
                </li>
                <li class="nav-item">
                    <a href="contact.html" class="nav-link">Transfer rygter</a>
                </li>
                <li class="nav-item">
                    <a href="contact.html" class="nav-link">Kontakt</a>
                </li>
                @if(Auth::user() ? Auth::user()->isAdmin() : '')
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link">Admin</a>
                </li>
                @endif
            </ul>
            <a class="ml-auto" href="https://facebook.com">
                <i class="fab fa-facebook-square fa-2x"></i>
            </a>
            <a class="ml-auto" href="https://instagram.com">
                <i class="fab fa-instagram fa-2x"></i>
            </a>
            <form class="form-inline ml-auto text-white">
                <input type="text" class="form-control mr-1" placeholder="Søg">
                <button type="submit" class="btn text-white">
                    <i class="fas fa-search fa-2x"></i>
                </button>
            </form>
        </div>
    </div>
</nav>
@yield('content')
<footer id="main-footer" class="text-center p-4 mt-3 ">
    <div class="container">
        <div class="row">
            <div class="col">
                <p>Copyright &copy; <span id="year"></span> Rabona.dk</p>
                <small>CMS & Design by Mikail Kocak</small>
            </div>
        </div>
    </div>
</footer>
@yield('scripts')
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());



</script>
</body>

</html>