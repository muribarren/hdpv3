<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imasd2 extends Model
{
    protected $table = 'imas_d2_s'; 

    protected $fillable = [
        'idhdp',
        'revision',
        'plan_distribucion',
        'establecido_plano',
        'revision_plano',
        'fecha_distribucion',
        'codigo_comercial',
        'semielaborados',
        'notas',
        'anexos'
    ];
}
