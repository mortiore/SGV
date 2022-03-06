<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idProduto';

    protected $fillable = [
        'idProduto',
        'nome',
        'descricao',
        'valor',
        'numEstoque'
        ];

}
