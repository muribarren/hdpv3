<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costos extends Model
{


    protected $table = 'costos'; 

    protected $fillable = ['idhdp', 'revision',  'tarifa_HIB', 'precio_tarifa', 'notas','anexos'];
    
}
