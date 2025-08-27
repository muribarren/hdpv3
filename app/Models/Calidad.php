<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calidad extends Model
{
    
    protected $table = 'calidads'; 

    protected $fillable = ['idhdp', 'revision', 'revision_serie_fecha', 'distribucion_copias', 'notas', 'anexos'];
}
