@extends('layout.site')
@section('titulo','Login')

@section('conteudo')
    <main id="indexLogin">
        <h3 class="titulo">LOGIN</h3>
        <div class="formLogin">
            <form action="{{route('login.entrar')}}" method="post">
                {{ csrf_field() }}
                <div class="input">
                    <label class="subTitulo">E-mail</label>
                    <br>
                    <input type="text"name="email">
                </div>
                <div class="input">
                    <label class="subTitulo">Senha</label>
                    <br>
                    <input type="password" name="senha">
                </div>
                <button class="loginButton">Entrar</button>
            </form>
        </div>
    </main>
@endsection