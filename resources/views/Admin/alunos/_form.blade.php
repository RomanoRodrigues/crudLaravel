<div class="input">
    <label class="subSubTitulo">Nome</label><br>
    <input type="text" name="nome" value="{{ isset($linha->nome) ? $linha->nome : '' }}">
    
</div>

<div class="input">
    <label class="subSubTitulo">Telefone</label><br>
    <input type="text" name="telefone" value="{{ isset($linha->telefone) ? $linha->telefone : '' }}">
    
</div>


<div>
    <label class="subSubTitulo" for="id_curso">Curso</label> <br>
    <select name="id_curso" id="id_curso">
        @foreach ($cursos as $curso)
            @if($curso->publicado)
                <option class="subSubTitulo" data-icon='{{ asset($curso->imagem) }}' value='{{$curso->id}}'>
                    {{$curso->titulo}}
                </option>
            @endif
        @endforeach
    </select>
</div>


<div class="input">
    <div>
        <span class="subSubTitulo">Imagem</span><br>
        <input type="file" name="arquivo">
    </div>
</div>
@if(isset($linha->imagem))
    <div class="input">
        <img width="150" src="{{asset($linha->imagem)}}" />
    </div>
@endif
<br>
@if(session('error'))
    {{ session('error') }}
@endif
<br>
<br>