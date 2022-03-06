<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;

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
