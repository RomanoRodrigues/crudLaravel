<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run() {
        $dados=[
            'name'=>"Tiago", 
            'email'=>"admin@email",
            'password'=>bcrypt("123")
        ];

        User::create($dados);

        $dados=[
            'name'=>"malcom",
            'email'=>"malcom@unesp.br",
            'password'=>bcrypt("senhadomalcom")
        ];
        
        User::create($dados);
    }
}
