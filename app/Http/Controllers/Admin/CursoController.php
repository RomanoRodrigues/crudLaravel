<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Database\QueryException;

class CursoController extends Controller
{
    public function index() {
        $rows = Curso::all();
        return view('admin.cursos.index', compact('rows'));
    }

    public function adicionar() {
        return view('admin.cursos.adicionar');
    }

    public function editar($id) {
        $linha  = Curso::find($id);
        return view('admin.cursos.editar', compact('linha'));
    }

    public function excluir($id) {
        Curso::find($id)->delete();
        return redirect()->route('admin.cursos');
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        $dados['publicado'] = $req->has('publicado') ? 1 : 0;

        if($req->hasFile('arquivo')) {
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        try {
            Curso::create($dados);
            return redirect()->route('admin.cursos');
        } catch (QueryException $e) {
            return redirect()->route('admin.cursos.adicionar')
                             ->with('error', 'valores inválidos! tente novamente');
        }

        
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();
        
        $dados['publicado'] = $req->has('publicado') ? 1 : 0;
        
        if($req->hasFile('arquivo')){
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
        Curso::find($id)->update($dados);
        return redirect()->route('admin.cursos');
    }
}
