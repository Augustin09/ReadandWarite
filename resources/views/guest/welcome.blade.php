<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <title>ReadAndWarite</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
</head>

<body>
    <div class="container">
        @if (Route::has('login'))
        <ul class="nav justify-content-end fixed-top">
            @auth
            <a href="{{ url('/home')}}">Home</a>
            @else
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                @if (Route::has('register'))
                <a class="nav-link text-dark" href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </li>
        </ul>
        @endif


        <div class="container flex-center">
            <div class="content">
                <div class="title m-b-md">
                    <h1>ReadAndWarite</h1>
                </div>
            </div>

            <div class="container search">
            <form action="{{ url('home') }}" method="get">
                <input class="form-control border-black" type="search" name="search" id="search" aria-label="search"
            placeholder="Search for stationary">
                <div class="row justify-content-center">
                    <button class="btn btn-primary m-1" type="submit">Search</button>
                </div>
            </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                    <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="{{ asset('storage/img/Book.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Notebook</h5>
                            <a href="{{ url('book') }}" class="btn btn-primary">Find Notebooks</a>
                        </div>
                    </div>
                </div>

                    <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="{{ asset('storage/img/Pencil.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Digital Pencil</h5>
                            <a href="{{ url('pencil') }}" class="btn btn-primary">Find Digital Pencil</a>
                        </div>
                    </div>
                </div>

                    <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="{{ asset('storage/img/Ruler.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ruler</h5>
                            <a href="{{ url('ruler') }}" class="btn btn-primary">Find Rulers</a>
                        </div>
                    </div>
                </div>

                    <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="{{ asset('storage/img/Dictionary.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Dictionary</h5>
                            <a href="{{ url('dictionary') }}" class="btn btn-primary">Find Dictionaries</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>


</body>

</html>
