@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
    @guest
        <main id="indexLogin">
            <h3 class="titulo">faz o login boy</h3>
            <article class="loginButton">
                <a href="{{route('login')}}"><button class="loginButton">Entrar</button></a>
            </article>
        </main>
    @endguest
    @auth
        <main id="indexHome">
            <article class="acesso acessoCursos">
                <a href="{{route('admin.cursos')}}"><button>ACESSAR<br>CURSOS</button></a>
            </article>
            <article class="acesso acessoAlunos">
                <a href="{{route('admin.alunos')}}"><button>ACESSAR<br>ALUNOS</button></a>
            </article>
        </main>
    @endauth
@endsection
