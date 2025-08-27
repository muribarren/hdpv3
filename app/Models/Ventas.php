<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;

    protected $table = 'ventas'; // Opcional si el nombre ya coincide

    protected $fillable = [
        'idhdp',
        'revision',
        'aceptada',
        'cantidad',
        'oferta',
        'plazo',
        'texto',
        'trabajo',
        'codigo',
        'fecha',
        'codigo_padre',
        'notas',
        'motivo_rechazo',
        'texto_otros',
        'sustituido_por',
        'anexos'
    ];
    
}