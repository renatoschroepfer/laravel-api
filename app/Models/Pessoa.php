<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'nacionalidade',
        'profissao',
        'data_nascimento',
    ];
}