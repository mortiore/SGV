<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
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
