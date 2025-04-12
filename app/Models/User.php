<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nome',
        'email',
        'celular',
        'ra',
        'curso',
        'tem_grupo',
        'bio',
        'pontos_fortes',
        'pontos_fracos',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}