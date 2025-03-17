<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts awesome -->
    <link rel="stylesheet" href="{{asset('storage/fontawesome-free-5.15.4-web/css/all.min.css')}}">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @livewireStyles
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                <a onclick="document.getElementById('search').classList.toggle('d-none')" class="me-3 ms-auto btn btn-sm text-white"><i class="fas fa-search"></i> Search</a>
                @guest
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome Guest
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        </ul>
                    </div>
                @else
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('home')}}">My Account</a></li>
                        <li><a class="dropdown-item" href="{{ route('news.index')}}">My News</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                    </ul>
                </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
        </nav>
        <div id="search" class="p-3 shadow bg-light d-none">
            @livewire('search')
        </div>
          <div class="bg-danger text-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 bg-secondary p-2">
                        Breaking News
                    </div>
                    <div class="col-md-8 p-2">
                        <marquee>@livewire('news.breaking')</marquee>
                    </div>
                    <div class="col-md-2 p-2 bg-secondary text-end">
                        {{ date('d M Y')}} <span id="time"></span>
                    </div>
                </div>
            </div>
          </div>

        <main class="py-4">
            @if (session()->has('message'))
                <div class="p-3">
                    <div class="alert alert-success mt-2">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            @if (session()->has('danger'))
            <div class="p-3">
                <div class="alert alert-danger mt-2">
                    {{ session('danger') }}
                </div>
            </div>
        @endif
            @yield('content')
        </main>
    </div>

    <footer>
        <div id="footer" class="border-top mt-5 bg-light py-3">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                    <div class="col">
                        <h4 class="fs-6">Categories</h4>
                        <a href="http://127.0.0.1:8000/technology/news">Technology</a><br>
                        <a href="http://127.0.0.1:8000/lifestyle/news">Lifestyle</a><br>
                        <a href="http://127.0.0.1:8000/business/news">Business</a><br>
                        <a href="http://127.0.0.1:8000/fashion/news">Fashion</a><br>
                        <a href="http://127.0.0.1:8000/health/news">Health</a><br>
                        <a href="http://127.0.0.1:8000/politics/news">Politics</a><br>
                        <a href="http://127.0.0.1:8000/entertainment/news">Entertainment</a><br>
                        <a href="http://127.0.0.1:8000/sports/news">Sports</a><br>
                        <a href="http://127.0.0.1:8000/international/news">International</a><br>
                        <a href="http://127.0.0.1:8000/e-sports/news">E-Sports</a><br>
                        <a href="http://127.0.0.1:8000/education/news">Education</a><br>
                        <a href="http://127.0.0.1:8000/miscellaneous/news">Miscellaneous</a><br>
                    </div>
                    <div class="col">
                        <h4 class="fs-6">Quick Links</h4>
                        <a href="{{ route('page',['page'=>'about'])}}">About</a><br>
                        <a href="{{ route('page',['page'=>'terms'])}}">Terms</a><br>
                        <a href="{{ route('page',['page'=>'privacy'])}}">Privacy Policy</a><br>
                    </div>
                    <div class="col">
                        <h4 class="fs-6">Follow us on</h4>
                        <a class="d-block mb-1" href="#">
                            <i class="fab fa-facebook-square fa-lg"></i> @fname </a>
                        <a class="d-block mb-1" href="#">
                            <i class="fab fa-twitter-square fa-lg"></i> @fname</a>
                        <a class="d-block mb-1" href="#">
                            <i class="fab fa-youtube-square fa-lg"></i> @fname </a>
                        <a class="d-block mb-1" href="#">
                            <i class="fab fa-instagram-square fa-lg"></i> @fname</a>
                    </div>
                    <div class="col">
                        <h4 class="fs-6">Subscribe</h4>
                        Enter email and get latest updates in your inbox
                        <form class="mt-4" action="">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <input type="submit" value="Subscribe" class="btn btn-secondary btn-sm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @livewireScripts
    <script>
        function startTime() {
          const today = new Date();
          let h = today.getHours();
          let m = today.getMinutes();
          let s = today.getSeconds();
          m = checkTime(m);
          s = checkTime(s);
          document.getElementById('time').innerHTML =  h + ":" + m + ":" + s;
          setTimeout(startTime, 1000);
        }

        function checkTime(i) {
          if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
          return i;
        }
        window.onload=function(){
            startTime();
        }
        </script>

</body>
</html>
