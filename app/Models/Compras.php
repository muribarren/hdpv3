<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{

    protected $table = 'compras'; 

    protected $fillable = ['idhdp', 'revision', 'precio', 'inversion_troquel', 'notas','anexos'];

}
