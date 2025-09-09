<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hdp;
use App\Models\User;
use App\Models\Participante;

class NuevoController extends Controller
{

    public function crearHdp(Request $request)
    {   
        $numero = $request->query('numero');
        $revision = $request->query('revision');
        $hdps = Hdp::all();
        $usuarios = User::all(); 
        return view('dashboard_nuevo', compact('hdps', 'usuarios', 'numero', 'revision'));
    }   

    public function procesar(Request $request)
    {
        // 1. Validar los datos (muy importante por seguridad y fiabilidad)
        $request->validate([
            'numero' => 'required|integer',
            'revision' => 'required|integer',
            'titulo' => 'nullable|string|max:255',
            'nombre_cliente' => 'nullable|string|max:255', // 'nullable' significa que es opcional
            'custoteam_proyecto' => 'nullable|string|max:255',
            'core_product' => 'nullable|boolean',
            'sustituye' => 'nullable|boolean',
            'sustitucion' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'consumo' => 'nullable|string|max:255',
            'consumo_unidad' => 'nullable|string|max:255',
            'consumo_tipo' => 'nullable|string|max:255',
            'precio_deseado' => 'nullable|string|max:255',
            'fecha_deseada' => 'nullable|date',
            'fecha_decision' => 'nullable|date',
            'fecha_comienzo' => 'nullable|date',
            'fecha_envio' => 'nullable|date',
            'requisitos' => 'nullable|string|max:255',
            'reciclaje' => 'nullable|string|max:255',
            'notas' => 'nullable|string|max:255',
            'responsable' => 'nullable|string|max:255',
            'sustituto_responsable' => 'nullable|string|max:255',
        ]);

        // 2. Acceder a los datos validados

        $numero = $request->input('numero');
        $revision = $request->input('revision');
        $titulo = $request->input('titulo');
        $nombre_cliente = $request->input('nombre_cliente');
        $custoteam_proyecto = $request->input('custoteam_proyecto');
        $core_product = $request->input('core_product');
        $sustituye = $request->input('sustituye');
        $sustitucion = $request->input('sustitucion');
        $descripcion = $request->input('descripcion');
        $consumo = $request->input('consumo');
        $consumo_unidad = $request->input('consumo_unidad');
        $consumo_tipo = $request->input('consumo_tipo');
        $precio_deseado = $request->input('precio_deseado');
        $fecha_deseada = $request->input('fecha_deseada');
        $fecha_decision = $request->input('fecha_decision');
        $fecha_comienzo = $request->input('fecha_comienzo');
        $fecha_envio = $request->input('fecha_envio');
        $requisitos = $request->input('requisitos');
        $reciclaje = $request->input('reciclaje');
        $notas = $request->input('notas');  
        $responsable = $request->input('responsable');
        $sustituto_responsable = $request->input('sustituto_responsable');
        
        $rutas = []; // Array para guardar todas las rutas
        if ($request->hasFile('anexos')) {
            foreach ($request->file('anexos') as $archivo) {
                $rutaArchivo = $archivo->storeAs(
                    'anexos/'.$numero.'/'.$revision, 
                    $archivo->getClientOriginalName(), 
                    'public'
                );
                $rutas[] = $rutaArchivo; // Guardamos cada ruta en el array
            }
        }

        // Opcional: convertir a string separadas por coma si querés guardar en DB
        $rutaString = implode(',', $rutas);

        // O puedes obtener todos los datos validados de golpe
        #$datosValidados = $request->validated();

        // 3. Aquí podrías guardar los datos en una base de datos, enviar un email, etc.
        // Por ejemplo, para demostrar, vamos a redirigir con un mensaje de éxito.
        $hdp = new Hdp();
        $hdp->numero = $numero;
        $hdp->revision = $revision;
        $hdp->titulo = $titulo;
        $hdp->nombre_cliente = $nombre_cliente;
        $hdp->custoteam_proyecto = $custoteam_proyecto;

        $custocoor_jefeproyecto = 0;
        if($custoteam_proyecto == "comfortswin")
            $custocoor_jefeproyecto = 1;
        else if($custoteam_proyecto == "correderas")
            $custocoor_jefeproyecto = 2;
        else if($custoteam_proyecto == "ecolift")
            $custocoor_jefeproyecto = 3;
        else if($custoteam_proyecto == "legadrive")
            $custocoor_jefeproyecto = 4;
        else if($custoteam_proyecto == "perfiles")
            $custocoor_jefeproyecto = 5;
        else if($custoteam_proyecto == "tapas")
            $custocoor_jefeproyecto = 6;
        else if($custoteam_proyecto == "proyecto")
            $custocoor_jefeproyecto = 7;    
         
        $hdp->custocoor_jefeproyecto = $custocoor_jefeproyecto;   
        $hdp->core_product = $core_product;
        $hdp->sustituye = $sustituye;
        $hdp->sustitucion = $sustitucion;
        $hdp->descripcion = $descripcion;
        $hdp->consumo = $consumo;
        $hdp->consumo_unidad = $consumo_unidad;
        $hdp->consumo_tipo = $consumo_tipo;
        $hdp->precio_deseado = $precio_deseado;
        $hdp->fecha_deseada = $fecha_deseada;
        $hdp->fecha_decision = $fecha_decision;
        $hdp->fecha_comienzo = $fecha_comienzo;
        $hdp->fecha_envio = $fecha_envio;
        $hdp->requisitos = $requisitos;
        $hdp->reciclaje = $reciclaje;
        $hdp->notas = $notas;   
        $hdp->responsable = $responsable;
        $hdp->sustituto_responsable = $sustituto_responsable;
        $hdp->anexos = $rutaString ?? null; 
       
        $hdp->save();

        $participante = new Participante();
        $participante ->numero = $numero;
        $participante ->revision = $revision;
        $participante ->creador = auth()->user()->id;
        $participante ->imasd = $request->input('imasd'); 
        $participante ->costos = $request->input('costos');
        $participante ->produccion = $request->input('produccion'); 
        $participante ->compras = $request->input('compras'); 
        $participante ->calidad = $request->input('calidad'); 
        $participante ->ventas = $request->input('ventas');
        $participante ->save();

        return redirect()->route('hdps')->with('success', '¡Formulario enviado con éxito!');
    }
}
