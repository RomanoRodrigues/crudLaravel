@extends('layout.site')
@section('titulo','Alunos')
@section('conteudo')
    <main class="formIndex">
        <h3 class="titulo">Adicionar Aluno</h3>
        <article class="row">
            <form action="{{route('admin.alunos.salvar')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.alunos._form')
                <button class="formButton">Salvar</button>
            </form>
        </article>
    </main>
@endsection