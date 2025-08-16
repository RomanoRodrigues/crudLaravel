@extends('layout.site')

@section('titulo','Alunos')

@section('conteudo')

<main id="index">
    <div class='titulo'>Lista de Alunos</div>
    <article class="tabela">
        <section class="headerTabelaAlunos">
            <div>Nome</div>
            <div>Telefone</div>
            <div>Curso</div>
            <div>Imagem</div>
            <div>Ação</div>
        </section>
        <section class="conteudoTabela">
            @foreach($rows as $row)   <!-- LOOP PRA LER A TABELA -->
                <div class="linhaTabelaAlunos">
                    <div class="loneItem">{{ $row->nome }}</div>
                    <div class="loneItem">{{ $row->telefone }}</div>
                    <div class="loneItem">{{ $row->curso->titulo }}</div>
                    <div class="loneItem">
                        <img src="{{ asset($row->imagem) }}" alt="{{ $row->nome }}">
                    </div>
                    <div class="linhaBotoes"> 
                        <a class='alterar' href="{{ route('admin.alunos.editar',$row->id) }}"><button>ALTERAR</button></a>
                        <a class='excluir' href="{{ route('admin.alunos.excluir',$row->id) }}"><button>EXCLUIR</button></a>
                    </div>
                </div>
            @endforeach
        </section>
    </article>
    <article class="botaoAdd">  <!-- BOTAO ADICIONAR -->
        <a class='adicionar' href="{{ route('admin.alunos.adicionar')}}"><button>ADICIONAR</button></a>
    </article>
</main>

@endsection 