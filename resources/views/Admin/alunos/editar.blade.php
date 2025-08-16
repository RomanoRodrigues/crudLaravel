@extends('layout.site')
@section('titulo','Alunos')
@section('conteudo')
<main class="formIndex">
        <h3 class="titulo">Editando Alunos</h3>
        <article class="row">
            <form action="{{route('admin.alunos.atualizar', $linha->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('admin.alunos._form')
                <button class="formButton">Salvar</button>
            </form>
        </article>
    </main>
    @endsection