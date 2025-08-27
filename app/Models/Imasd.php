<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imasd extends Model
{
    protected $table = 'imas_d_s'; 

    protected $fillable = ['idhdp', 'revision', 'clase', 'ensayo_hecho', 'plano_provisional', 'anexos', 'realizado_prototipo', 'enviado_a_cliente', 'notas', 'paso_siguiente' ];
}
