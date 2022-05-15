<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'imagem',
        'valor',
        'numEstoque',
        'ativo'
        ];

}
