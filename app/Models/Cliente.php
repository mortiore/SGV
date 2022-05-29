<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'telefone',
        'email',
        'bairro',
        'rua',
        'numCasa'
    ];

}
