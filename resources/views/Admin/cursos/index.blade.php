@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')

<main id="index">
    <div class='titulo'>Lista de Cursos</div>
    <article class="tabela">
        <section class="headerTabelaCursos">
            <div>Titulo</div>
            <div>Descrição</div>
            <div>Publicado</div>
            <div>Valor</div>
            <div>Imagem</div>
            <div>Ação</div>
        </section>
        <section class="conteudoTabela">
            @foreach($rows as $row)   <!-- LOOP PRA LER A TABELA -->
                <div class="linhaTabelaCursos">
                    <div class="loneItem">{{ $row->titulo }}</div>
                    <div class="loneItem">{{ $row->descricao }}</div>
                    <div class="loneItem">{{ $row->publicado ? "Sim" : "Não" }}</div>
                    <div class="loneItem">{{ $row->valor }}</div>
                    <div class="loneItem">
                        <img src="{{ asset($row->imagem) }}" alt="{{ $row->titulo }}">
                    </div>
                    <div class="linhaBotoes"> 
                        <a class='alterar' href="{{ route('admin.cursos.editar',$row->id) }}"><button>ALTERAR</button></a>
                        <a class='excluir' href="{{ route('admin.cursos.excluir',$row->id) }}"><button>EXCLUIR</button></a>
                    </div>
                </div>
            @endforeach
        </section>
    </article>
    <article class="botaoAdd">  <!-- BOTAO ADICIONAR -->
        <a class='adicionar' href="{{ route('admin.cursos.adicionar')}}"><button>ADICIONAR</button></a>
    </article>
</main>
@endsection 