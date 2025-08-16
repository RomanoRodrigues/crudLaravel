@extends('layout.site')
@section('titulo','Cursos')
@section('conteudo')
    <main style="margin: 0 10vw 0 10vw">
        <h3 class="titulo">Editando Cursos</h3>
        <article class="row">
            <form action="{{route('admin.cursos.atualizar', $linha->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('admin.cursos._form')
                <button class="formButton">Salvar</button>
            </form>
        </article>
    </main>
@endsection