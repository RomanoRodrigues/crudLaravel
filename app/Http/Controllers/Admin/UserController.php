<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;

class AlunoController extends Controller
{
    public function index() {
        $rows = User::all();
        return view('admin.alunos.index', compact('rows'));
    }

    public function adicionar() {
        $cursos = User::all()->where('publicado', '=', 'sim');
        return view('admin.alunos.adicionar', compact('cursos'));
    }

    public function editar($id) {
        $linha  = User::find($id);
        return view('admin.alunos.editar', compact('linha'), compact('cursos'));
    }

    public function excluir($id) {
        Aluno::find($id)->delete();
        return redirect()->route('admin.alunos');
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();
        if($req->hasFile('arquivo')) {
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/alunos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        try {
            Aluno::create($dados);
            return redirect()->route('admin.alunos');
        } catch (QueryException $e) {
            return redirect()->route('admin.alunos.adicionar')
                             ->with('error', 'valores inválidos! tente novamente');
        }
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->except('arquivo');
        if ($req->hasFile('arquivo')) {
            $imagem = $req->file('arquivo');
            $num = rand(1111, 9999);
            $dir = "img/alunos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir . $nomeImagem;
        } 
        else {
            $aluno = Aluno::find($id);
            $dados['imagem'] = $aluno->imagem;
        }
    
        Aluno::find($id)->update($dados);
        return redirect()->route('admin.alunos');
    }
}
