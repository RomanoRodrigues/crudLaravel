<html>
    <head>
      <title>@yield('titulo')</title>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <header>
            <a href="#!" class="brand-logo center">Projeto CRUDs</a>
        </header>
        <nav>
                <div class="navItem">
                    <a href="/">
                        <button>HOME</button>
                    </a>
                </div>
            @guest
                <div class="navItem">
                    <a href="{{route('login')}}"><button>LOGIN</button></a>
                </div>
            @endguest
            @auth
                <div class="navItem">
                    <a href="{{route('admin.cursos')}}"><button>CURSOS</button></a>
                </div>
                <div class="navItem">
                    <a href="{{route('admin.alunos')}}"><button>ALUNOS</button></a>
                </div>
                <div class="navItem">
                    <a href="{{ route('admin.user') }}"><button>{{ Auth::user()->name }}</button></a>
                </div>
                <div class="navItem">
                    <a href="{{ route('login.sair') }}"><button>SAIR</button></a>
                </div>
            @endauth
        </nav>