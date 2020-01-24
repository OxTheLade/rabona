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
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <title>Rabona.dk | Få de seneste nyheder!</title>
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="{{route('index')}}" class="navbar-brand">Back to the side</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a href="{{route('admin.index')}}"
                       class="nav-link {{ request()->route()->getName() === 'admin.index' ? 'active'  : '' }} "><i
                                class="fas fa-home"></i> Dashboard</a>
                </li>
                <li class="nav-item px-2 dropdown">
                    <a href="posts"
                       class="nav-link dropdown-toggle {{request()->route()->getName() === 'posts.index' ? 'active' : ''}} {{request()->route()->getName() === 'posts.create' ? 'active' : ''}}"
                       data-toggle="dropdown">Posts</a>
                    <div class="dropdown-menu">
                        <a href="{{route('posts.index')}}"
                           class="dropdown-item {{request()->route()->getName() === 'posts.index' ? 'active' : ''}}">
                            <i class="far fa-newspaper"></i> All Post
                        </a>
                        <a href="{{route('posts.create')}}"
                           class="dropdown-item {{request()->route()->getName() === 'posts.create' ? 'active' : ''}}">
                            <i class="fas fa-pencil-alt"></i> Add Post
                        </a>
                    </div>
                </li>
                <li class="nav-item px-2">
                    <a href="categories.html" class="nav-link">Categories</a>
                </li>
                <li class="nav-item px-2">
                    <a href="users.php" class="nav-link">Users</a>
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

@yield('content')

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    @yield('scripts')
</script>
</body>

</html>