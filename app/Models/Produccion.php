<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    
    protected $table = 'produccions'; 

    protected $fillable = ['idhdp', 'revision', 'inversion_necesaria', 'importe_inversion', 'material', 'acabado', 'peso_pieza', 'anexos', 'igual_a_estructura', 'inversion_troquel', 'plazo', 'notas', 'estructura'];

}
