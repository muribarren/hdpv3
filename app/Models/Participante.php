<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = [
        'numero',
        'revision', 
        'imasd',
        'produccion',
        'compras',
        'costes',
        'comercial',
        'calidad',
        'logistica',        
    ];
}
