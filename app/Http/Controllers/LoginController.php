<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() { // a visão que pede usuário e senha
            return view('login.index');
        }

        public function entrar(Request $req) {
            $dados = $req->all();
            if ( Auth::attempt( [ 'email' => $dados['email'], 'password' => $dados['senha'] ] ) ) {
                return redirect()->route('home');
            }
            else {
                return view('login.index');
            }
        }

        public function sair() {
            Auth::logout();
            return redirect()->route('home');
        }
}
