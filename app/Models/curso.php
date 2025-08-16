<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
        'valor',
        'publicado'
        ];
}
