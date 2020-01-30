<!DOCTYPE html>
<html lang="dk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/6e0b74ce89.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.0/d3.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="{{asset("css/sidebar.css")}}">
    <title>Rabona.dk | Author</title>
</head>


<body>
<!-- START HERE -->
<nav id="nav" class="navbar navbar-expand-sm navbar-dark p-0">
    <div class="container">
        <a href="{{route('index')}}" class="navbar-brand">Back to the side</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item px-2 dropdown d-lg-none">
                    <a href=""
                       class="nav-link dropdown-toggle {{request()->route()->getName() === 'author.posts.index' ? 'active' : ''}} {{request()->route()->getName() === 'author.posts.create' ? 'active' : ''}}"
                       data-toggle="dropdown">Posts</a>
                    <div class="dropdown-menu">
                        <a href="{{route('author.posts.index')}}"
                           class="dropdown-item {{request()->route()->getName() === 'author.posts.index' ? 'active' : ''}}">
                            <i class="far fa-newspaper"></i> All Post
                        </a>
                        <a href="{{route('author.posts.create')}}"
                           class="dropdown-item {{request()->route()->getName() === 'author.posts.create' ? 'active' : ''}}">
                            <i class="fas fa-pencil-alt"></i> Add Post
                        </a>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-user"></i> {{Auth::user()->name}}
                    </a>

                    <div class="dropdown-menu">
                        <a href="{{route('profile.index')}}" class="dropdown-item">
                            <i class="fas fa-user-circle"></i> Profile
                        </a>
                        <a href="settings.html" class="dropdown-item">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-user-times"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 d-sm-none d-lg-block">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <div class="sidenav">
                    <li class="nav-item px-2">
                        <a href="{{route('author.index')}}"
                           class="nav-link {{ request()->route()->getName() === 'author.index' ? 'active'  : '' }} "><i
                                    class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li class="dropdown-btn nav-link"><a class="nav-link {{ request()->route()->getName() === 'author.posts.index' ? 'active'  : '' }}"><i
                                    class="fas fa-pencil-alt"></i> Posts
                        <i class="fa fa-caret-down"></i></a>
                    </li>
                    <div class="dropdown-container">
                        <a href="{{route('author.posts.index')}}">View your posts</a>
                        <a href="{{route('author.posts.create')}}">Add Post</a>
                    </div>






                    <a href="#services">Services</a>
                    <a href="#clients">Clients</a>
                    <a href="#contact">Contact</a>
                    <li class="dropdown-btn">Dropdown
                        <i class="fa fa-caret-down"></i>
                    </li>
                    <div class="dropdown-container">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                    <a href="#contact">Search</a>
                </div>
            </ul>
        </div>
    </div>
</nav>

@yield('content')


<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

<script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
</body>

</html>