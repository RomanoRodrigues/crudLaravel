<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function index() {
        $rows = User::all();
        return view('admin.users.index', compact('rows'));
    }

    public function adicionar() {
        $cursos = User::all()->where('publicado');
        return view('admin.users.adicionar', compact('cursos'));
    }

    public function editar($id) {
        $linha  = User::find($id);
        return view('admin.users.editar', compact('linha'), compact('cursos'));
    }

    public function excluir($id) {
        User::find($id)->delete();
        return redirect()->route('admin.users');
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();
        if($req->hasFile('arquivo')) {
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/users/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        try {
            User::create($dados);
            return redirect()->route('admin.users');
        } catch (QueryException $e) {
            return redirect()->route('admin.users.adicionar')
                             ->with('error', 'valores inválidos! tente novamente');
        }
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->except('arquivo');
        if ($req->hasFile('arquivo')) {
            $imagem = $req->file('arquivo');
            $num = rand(1111, 9999);
            $dir = "img/users/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir . $nomeImagem;
        } 
        else {
            $user = User::find($id);
            $dados['imagem'] = $user->imagem;
        }
    
        User::find($id)->update($dados);
        return redirect()->route('admin.users');
    }
}
