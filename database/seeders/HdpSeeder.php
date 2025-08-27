<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class HdpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run()
{
    DB::table('hdps')->insert([
        'titulo' => 'Producto de prueba',
        'codigo_cliente' => 'CL001',
        'nombre_cliente' => 'Cliente Ficticio',
        'custoteam_proyecto' => 'ABC',
        'core_product' => true,
        'sustituye' => false,
        'sustitucion' => 'Antiguo producto',
        'descripcion' => 'Una prueba para el seed',
        'consumo' => 100,
        'consumo_unidad' => 'piezas',
        'consumo_tipo' => 'mensual',
        'precio_deseado' => 123.45,
        'fecha_deseada' => now(),
        'fecha_decision' => now(),
        'fecha_comienzo' => now(),
        'fecha_envio' => now(),
        'requisitos' => 'Ninguno',
        'reciclaje' => false,
        'secuencia' => 1,
        'rechazado' => false,
        'notas' => 'Probando seeder',
        'comienzo_proyecto' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
}
