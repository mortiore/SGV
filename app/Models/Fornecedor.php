<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idFornecedor';

    protected $fillable = [
        'idFornecedor',
        'nome',
        'telefone',
        'email',
        'bairro',
        'rua',
        'numCasa'
    ];

}
