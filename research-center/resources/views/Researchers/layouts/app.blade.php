<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Researcher Dashboard')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tambahan CSS kalau perlu -->
    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('researchers.dashboard')}}">Research Center</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('researchers.publications') }}">Publications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('researchers.profile') }}">Hai, {{ Auth::user()->name }}</a>
                </li>
                
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-outline-light">Logout</button>
                    </form>
                </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


    <!-- Main Content -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
