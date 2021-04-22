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
    <script type='text/javascript'> 
        window.__cb = window.__cb || {}; 
        window.__cb.id = "608179c7389aee0d861fa5d0"; 
        (
            function() { 
                var be = document.createElement('script'); 
                    be.type = 'text/javascript'; 
                    be.async = true; 
                    be.src = 'https://cdn.duotalk.com.br/widget/plugin.js/';
                var s = document.getElementsByTagName('script')[0]; 
                    s.parentNode.insertBefore(be, s);
            }
        );
        (
            function(){
                var heig = window.innerHeight;
                var wid = window.innerWidth;
                if(wid < 600){
                    var bubble = document.getElementsByClassName('talk-bubble');
                    
                    bubble.style.display = 'none';
                    console.log(bubble[0]);
                }
                console.log(heig, wid);
            }
        )
        (); 
    </script>
</body>

</html>
