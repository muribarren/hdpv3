<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hdp extends Model
{
    use HasFactory;

    protected $table = 'hdps'; 

    protected $fillable = ['numero', 'revision', 'titulo', 
                           'nombre_cliente', 'custoteam_proyecto', 'custocoor_jefeproyecto', 'core_product', 
                           'sustituye', 'sustitucion', 'descripcion', 
                           'consumo', 'consumo_unidad', 'consumo_tipo', 
                           'precio_deseado', 'fecha_deseada', 
                           'fecha_decision', 'fecha_comienzo', 
                           'fecha_envio', 'requisitos', 
                           'reciclaje', 'notas', 'responsable', 'anexos', 'rechazado','motivo_rechazo', 'aprobado'];

    protected $casts = [
        'fecha_deseada' => 'datetime',
        'fecha_decision' => 'datetime',
        'fecha_comienzo' => 'datetime',
        'fecha_envio' => 'datetime',
    ];
}

