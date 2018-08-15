<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="has-background-primary">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog</title>

    <!-- Styles -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css" />

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

</head>

<body class="has-background-primary">
    <div id="app">
        <nav class="navbar is-black" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/') }}">
                    <h3>Home</h3>
                </a>
            </div>


            <div class="navbar-end">

                @if (Auth::guest())

                <div class="navbar-item">
                    <a class="button is-large is-info" href="{{ route('login') }}">Login</a>
                </div>

                <div class="navbar-item">
                    <a class="button is-large is-warning" href="{{ route('register') }}">Cadastro</a>
                </div>


                @else
                <div class="navbar-item">
                    <a class="button is-large is-link" href="{{ route('post.index') }}">Meus posts</a>
                </div>
                <div class="navbar-item">
                    <a class="button is-large is-warning is-link" href="{{ route('post.create') }}">Adicionar post</a>
                </div>
                <div class="navbar-item">
                    <a class="button is-large is-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endif
            </div>

    </div>

    </nav>
    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}">
    </script>
</body>

</html>