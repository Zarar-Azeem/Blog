<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">
    <!-- Alpines CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>
    <!-- FontAwesome CDN -->
    <script src="https://kit.fontawesome.com/0f29da6843.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
        @auth
        <nav>
            <ul>
                <h1>Blogs</h1>
                <li><a href="/home">Home</a></li>
                <li><a href="/myposts">My Posts</a></li>
                <li><a href="/create">Create Posts</a></li>
            </ul>
            <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-user"></i>{{Auth::user()->username}}</button>
                <div class="dropdown-content">
                    <a href="/logout">Logout</a>
                </div>
            </div>
        </nav>
        @else
        <nav>
            <ul>
                <li><a href="/register">Register</a></li>
                <li><a href="{{route("login")}}">Login</a></li>
            </ul>
        </nav>
        @endauth
    <div class="main">
        <main class="container">
            @yield('content')
        </main>
    </div>
</body>
</html>