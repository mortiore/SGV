<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{

    protected $fillable = [
        'idCliente',
        'nome',
        'telefone',
        'email',
        'bairro',
        'rua',
        'numCasa'
    ];

}
