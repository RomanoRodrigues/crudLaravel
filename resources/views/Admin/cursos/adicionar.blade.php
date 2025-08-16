@extends('layout.site')
@section('titulo','Cursos')
@section('conteudo')
    <main class="formIndex">
        <h3 class="titulo">Adicionar Curso</h3>
        <article class="row">
            <form action="{{route('admin.cursos.salvar')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.cursos._form')
                <button class="formButton">Salvar</button>
            </form>
        </article>
    </main>
@endsection