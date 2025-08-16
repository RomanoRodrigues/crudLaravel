<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome', 'telefone', 'id_curso', 'imagem'
    ];

    // Relacionamento com Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
}
