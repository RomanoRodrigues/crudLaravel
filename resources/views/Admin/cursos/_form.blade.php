<div class="input">
    <label class="subSubTitulo">Título</label> <br>
    <input type="text" name="titulo" value="{{ isset($linha->titulo) ? $linha->titulo : '' }}">
</div>
<div class="input">
    <label class="subSubTitulo">Descrição</label> <br>
    <input type="text" name="descricao" value="{{ isset($linha->descricao) ? $linha->descricao : '' }}">
</div>
<div class="input">
    <label class="subSubTitulo">Valor</label> <br>   
    <input type="text" name="valor" value="{{isset($linha->valor) ? $linha->valor : ''}}">
</div>
<div class="input">
    <div>
        <span>Imagem</span> <br>
        <input type="file" name="arquivo">
    </div>
</div>
@if(isset($linha->imagem))
    <div class="input">
        <img width="150" src="{{asset($linha->imagem)}}"/>
    </div>
@endif
<div class="input">
    <p>
        <label>
            <input 
                type="checkbox" 
                name="publicado" 
                value="1" 
                {{ isset($linha->publicado) && $linha->publicado ? 'checked' : '' }}
            >
            <span>Publicar?</span>
        </label>
    </p>
    <br>
</div>
<br>
@if(session('error'))
    {{ session('error') }}
@endif
<br>
