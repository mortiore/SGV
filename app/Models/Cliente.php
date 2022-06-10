<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Cliente as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'telefone',
        'email',
        'bairro',
        'rua',
        'numCasa',
        'password',
        'verificado'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
