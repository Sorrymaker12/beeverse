<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BeeVerse | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>


<body>
    {{-- NAVBAR --}}
    @include('sweetalert::alert')
    <nav class="navbar navbar-expand-lg navbar-dark px-4" style="background-color: #89CFF0">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">BeeVerse</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- b4 Login --}}

            {{-- after Login --}}
            @if (Auth::check())
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Config::get('languages')[App::getLocale()] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                            {{ $language }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">{{ __('main.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/showoff">{{ __('main.show_off') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/avatar">{{ __('main.avatar') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/friends">{{ __('main.friends') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/myprofile">{{ __('main.profile') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">{{ __('main.Logout') }}</a>
                        </li>
                    </ul>
                </div>
            @elseif (!Auth::check())
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ Config::get('languages')[App::getLocale()] }}
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach (Config::get('languages') as $lang => $language)
                                        <li><a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                                {{ $language }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">{{ __('main.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">{{ __('main.login') }}</a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
