<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') | {{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('custom_css')
</head>
<body>
    
    <div class="container">
        <div class="header-container">
            <nav class="navbar navbar-dark navbar-expand-sm bg-dark fixed-top">
                <div class="container">
                    <a href="/" class="navbar-brand">
                        <i class="fas fa-blog"></i> &nbsp;
                        Someone's Blog
                    </a>
            
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                    <div id="navbarCollapse" class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="{{ route('homepage')}}" class="nav-link active">
                                    Home
                                </a>
                            </li>
                            @guest
                                <li class="nav-item">
                                    <a href="{{route('login.view')}}" class="nav-link active">
                                        Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('register.view')}}" class="nav-link active">
                                        Register
                                    </a>
                                </li>
                            @else
                                @if(Auth::user()->roles()->where('role', 'admin')->exists())
                                    <a href="{{route('admin.dashboard')}}" class="btn btn-primary nav-link active">
                                        Dashboard
                                    </a>
                                @endif
                                    <a href="{{route('logout')}}" class="btn btn-secondary nav-link active ms-3">
                                        Logout
                                    </a>
                                <li class="nav-item">aads</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="content">
            @yield("content")
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    @yield('custom_scripts')
</body>
</html>