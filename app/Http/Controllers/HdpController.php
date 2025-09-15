<?php

namespace App\Http\Controllers;

use App\Models\Calidad;
use App\Models\Compras;
use App\Models\Costos;
use App\Models\Hdp;
use App\Models\Imasd;
use App\Models\Imasd2;
use App\Models\Produccion;
use App\Models\ventas;
use App\Models\User;
use App\Models\Participante;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Auth;

class HdpController extends Controller
{
     public function mostrarHdps()
    {
        $hdps = Hdp::orderBy('numero', 'desc')
           ->orderBy('revision', 'desc')
           ->get();
        $usuarios = User::all();


       $loged_user = Auth::user()->id;
       $tareas_pendientes = Hdp::join('participantes as part', function ($join) {
                                    $join->on('hdps.numero', '=', 'part.numero')
                                        ->on('hdps.revision', '=', 'part.revision');
                                })
                                ->where('hdps.rechazado', false)
                                ->where(function ($query) use ($loged_user) {
                                    $query->where(function ($q) use ($loged_user) {
                                        $q->where('part.imasd', $loged_user)
                                        ->whereIn('hdps.secuencia', [1, 6]);
                                    })
                                    ->orWhere(function ($q) use ($loged_user) {
                                        $q->where('part.produccion', $loged_user)
                                        ->where('hdps.secuencia', 2);
                                    })
                                    ->orWhere(function ($q) use ($loged_user) {
                                        $q->where('part.compras', $loged_user)
                                        ->where('hdps.secuencia', 3);
                                    })
                                    ->orWhere(function ($q) use ($loged_user) {
                                        $q->where('part.costos', $loged_user)
                                        ->where('hdps.secuencia', 4);
                                    })
                                    ->orWhere(function ($q) use ($loged_user) {
                                        $q->where('part.ventas', $loged_user)
                                        ->where('hdps.secuencia', 5);
                                    })                                    
                                    ->orWhere(function ($q) use ($loged_user) {
                                        $q->where('part.calidad', $loged_user)
                                        ->where('hdps.secuencia', 7);
                                    });
                                })
                                ->select('hdps.numero', 'hdps.revision', 'hdps.titulo', 'hdps.secuencia')
                                ->get();


        return view('dashboard', compact('hdps','usuarios', 'tareas_pendientes'));
    }
    

    public function mostrarHdp($num, $rev)
    {
        $hdp = Hdp::where('numero', $num)->where('revision', $rev)->first();
        $imasd = Imasd::where('idhdp', $num)->where('revision', $rev)->first();
        if ($imasd === null) {
            $imasd = new Imasd();
            $imasd -> idhdp = $num;
            $imasd -> revision = $rev;
        }
        $produccion = Produccion::where('idhdp', $num)->where('revision', $rev)->first();
        if ($produccion === null) {
            $produccion = new Produccion();
            $produccion -> idhdp = $num;
            $produccion -> revision = $rev;
        }
        $compras = Compras::where('idhdp', $num)->where('revision', $rev)->first();
        if ($compras === null) {
            $compras = new Compras();
            $compras -> idhdp = $num;
            $compras -> revision = $rev;
        }
        $costos = Costos::where('idhdp', $num)->where('revision', $rev)->first();
        if ($costos === null) {
            $costos = new Costos();
            $costos -> idhdp = $num;
            $costos -> revision = $rev;
        }
        $ventas = Ventas::where('idhdp', $num)->where('revision', $rev)->first();
        if ($ventas === null) {
            $ventas = new Ventas();
            $ventas -> idhdp = $num;
            $ventas -> revision = $rev;
        }
        $imasd2 = Imasd2::where('idhdp', $num)->where('revision', $rev)->first();
        if ($imasd2 === null) {
            $imasd2 = new Imasd2();
            $imasd2 -> idhdp = $num;
            $imasd2 -> revision = $rev;
        }
        $calidad = Calidad::where('idhdp', $num)->where('revision', $rev)->first();
        if ($calidad === null) {
            $calidad = new Calidad();
            $calidad -> idhdp = $num;
            $calidad -> revision = $rev;
        }
        $participante = Participante::where('numero', $num)->where('revision', $rev)->first();
        $usuarios = User::all(); 

        $loged_user = Auth::user();

       
        return view('dashboard_hdp', compact('hdp', 'imasd', 'produccion', 'compras', 'costos', 'ventas', 'imasd2', 'calidad', 'usuarios', 'participante', 'loged_user'));
    }

    public function procesar(Request $request)
    {
        switch ($request->input('tipo')) {
                case 'imasd':
                    return $this->procesarImasd($request);
                case 'produccion':
                    return $this->procesarProduccion($request);
                case 'compras':
                    return $this->procesarCompras($request);
                case 'costos':
                    return $this->procesarCostos($request);
                case 'ventas':
                    return $this->procesarVentas($request);
                case 'imasd2':
                    return $this->procesarImasd2($request);
                case 'calidad':
                    return $this->procesarCalidad($request);
                default:
                    return redirect()->route('hdps')->with('error', 'Tipo de formulario no válido.');
            }
        // 1. Validar los datos que vienen por formulario (no los de la ruta)
        
    }

    public function procesarImasd(Request $request)
    {

        $request->validate([
            'clase' => 'nullable|string|max:255',
            //'ensayo_hecho' => 'nullable|boolean',
            //'plano_provisional' => 'nullable|file',  // si esperas un solo archivo
            //'realizado_prototipo' => 'nullable|boolean',
            'enviado_a_cliente' => 'nullable|date',
            'notas' => 'nullable|string|max:255',
            'paso_siguiente' => 'nullable|string|max:255',
        ]);

        // 2. Obtener los datos de la ruta
        $idhdp = $request->input('idhdp');
        $revision =    $request->input('revision');

        // 3. Obtener los inputs
        $clase = $request->input('clase');
        $ensayo_hecho = $request->input('ensayo_hecho');
        $realizado_prototipo = $request->input('realizado_prototipo') ;
        $enviado_a_cliente = $request->input('enviado_a_cliente') ;
        $notas = $request->input('notas');
        $paso_siguiente = $request->input('paso_siguiente');
        $plano_provisional = $request->boolean('plano_provisional'); 

     
        $rutas = []; 
        if ($request->hasFile('anexos')) {
            foreach ($request->file('anexos') as $archivo) {
                $rutaArchivo = $archivo->storeAs(
                    'anexos/'.$idhdp.'/'.$revision, 
                    $archivo->getClientOriginalName(), 
                    'public'
                );
                $rutas[] = $rutaArchivo; 
            }
        }
        $rutaString = implode(',', $rutas);

        $imasd = Imasd::where('idhdp', $idhdp)
                    ->where('revision', $revision)
                    ->first();

        if (!$imasd) {
            $imasd = new Imasd();
            $imasd->idhdp = $idhdp;
            $imasd->revision = $revision;
        }

        $imasd->clase = $clase;
        $imasd->ensayo_hecho = $ensayo_hecho;
        $imasd->anexos = $rutaString; 
        $imasd->plano_provisional = $plano_provisional; // guardamos la ruta, no el input original

        $imasd->realizado_prototipo = $realizado_prototipo;
        $imasd->enviado_a_cliente = $enviado_a_cliente;
        $imasd->notas = $notas;
        $imasd->paso_siguiente = $paso_siguiente;
        $imasd->save();


        $hdp = Hdp::where('numero', $idhdp)
                    ->where('revision', $revision)
                    ->first();

        if ($paso_siguiente == 'produccion')
            $hdp->secuencia = 2;
        elseif ($paso_siguiente == 'compras')
            $hdp->secuencia = 3;
        else 
            $hdp->secuencia = 2;
        
        $hdp->save();

        return redirect()->route('hdps')->with('success', '¡Formulario I+D enviado con éxito!');
    }
    public function procesarProduccion(Request $request)
    { 
        $idhdp = $request->input('idhdp');
        $revision =    $request->input('revision');
        $inversion_necesaria = $request->input('inversion_necesaria');
        $importe_inversion = $request->input('importe_inversion');
        $material = $request->input('material');
        $acabado = $request->input('acabado');
        $peso_pieza = $request->input('peso_pieza');
        $estructura = $request->input('estructura');
        $igual_a_estructura = $request->input('igual_a_estructura');
        $inversion_troquel = $request->input('inversion_troquel');
        $plazo = $request->input('plazo');
        $notas = $request->input('notas');

        $rutas = []; 
        if ($request->hasFile('anexos')) {
            foreach ($request->file('anexos') as $archivo) {
                $rutaArchivo = $archivo->storeAs(
                    'anexos/'.$idhdp.'/'.$revision, 
                    $archivo->getClientOriginalName(), 
                    'public'
                );
                $rutas[] = $rutaArchivo; 
            }
        }
        $rutaString = implode(',', $rutas);



        $produccion = Produccion::where('idhdp', $idhdp)
                    ->where('revision', $revision)
                    ->first();

        if (!$produccion) {
            $produccion = new Produccion();
            $produccion->idhdp = $idhdp;
            $produccion->revision = $revision;
        }
       
        $produccion->inversion_necesaria = $inversion_necesaria;
        $produccion->importe_inversion = $importe_inversion;
        $produccion->material = $material;
        $produccion->acabado = $acabado;
        $produccion->peso_pieza = $peso_pieza;
        $produccion->estructura = $estructura;
        $produccion->igual_a_estructura = $igual_a_estructura;
        $produccion->inversion_troquel = $inversion_troquel;
        $produccion->plazo = $plazo;
        $produccion->anexos = $rutaString;
        $produccion->notas = $notas;

        $produccion->save();

        $hdp = Hdp::where('numero', $idhdp)
                    ->where('revision', $revision)
                    ->first();
                    
        $imasd = Imasd::where('idhdp', $idhdp)
                    ->where('revision', $revision)
                    ->first();
        
        
        if ($imasd->paso_siguiente == 'produccioncompras')
            $hdp->secuencia = 3;
        else 
            $hdp->secuencia = 4;

        $hdp->save();

        return redirect()->route('hdps')->with('success', '¡Formulario producción enviado con éxito!');
    }

     public function procesarCompras(Request $request)
    { 
        $idhdp = $request->input('idhdp');
        $revision =    $request->input('revision');
        $precio = $request->input('precio');
        $inversion_troquel = $request->input('inversion_troquel');
        $notas = $request->input('notas');

        $rutas = []; 
        if ($request->hasFile('anexos')) {
            foreach ($request->file('anexos') as $archivo) {
                $rutaArchivo = $archivo->storeAs(
                    'anexos/'.$idhdp.'/'.$revision, 
                    $archivo->getClientOriginalName(), 
                    'public'
                );
                $rutas[] = $rutaArchivo; 
            }
        }
        $rutaString = implode(',', $rutas);

        $compras = Compras::where('idhdp', $idhdp)
                    ->where('revision', $revision)
                    ->first();

        if (!$compras) {
            $compras = new Compras();
            $compras->idhdp = $idhdp;
            $compras->revision = $revision;
        }
       
        $compras->precio = $precio;
        $compras->inversion_troquel = $inversion_troquel;
        $compras->notas = $notas;    
        $compras->anexos = $rutaString; 
        $compras->save();

        $hdp = Hdp::where('numero', $idhdp)
                    ->where('revision', $revision)
                    ->first();
        
        $hdp->secuencia = 4;
        $hdp->save();

        return redirect()->route('hdps')->with('success', '¡Formulario compras enviado con éxito!');
    }


    public function procesarCostos(Request $request)
    {

        $idhdp = $request->input('idhdp');
        $revision =    $request->input('revision');
        
        $tarifa_HIB = $request->input('tarifa_HIB');
        $precio_tarifa = $request->input('precio_tarifa');
        $notas = $request->input('notas');

        $rutas = []; 
        if ($request->hasFile('anexos')) {
            foreach ($request->file('anexos') as $archivo) {
                $rutaArchivo = $archivo->storeAs(
                    'anexos/'.$idhdp.'/'.$revision, 
                    $archivo->getClientOriginalName(), 
                    'public'
                );
                $rutas[] = $rutaArchivo; 
            }
        }
        $rutaString = implode(',', $rutas);

        
        $costos = Costos::where('idhdp', $idhdp)
                    ->where('revision', $revision)
                    ->first();

        if (!$costos) {
            $costos = new Costos();
            $costos->idhdp = $idhdp;
            $costos->revision = $revision;
        }
        
        $costos->precio_tarifa = $precio_tarifa;
        $costos->tarifa_HIB = $tarifa_HIB;
        $costos->notas = $notas;
        $costos->anexos = $rutaString;
        $costos->save();

        $hdp = Hdp::where('numero', $idhdp)
                    ->where('revision', $revision)
                    ->first();
        $hdp->secuencia = 5;
        $hdp->save();

        return redirect()->route('hdps')->with('success', '¡Formulario enviado con éxito!');
    }

    public function procesarVentas(Request $request)
    {
         $idhdp = $request->input('idhdp'); 
        $revision =    $request->input('revision');
        $aceptada = $request->input('aceptada');
        $cantidad = $request->input('cantidad');
        $oferta = $request->input('oferta');
        $plazo = $request->input('plazo');
        $texto = $request->input('texto');
        $trabajo = $request->input('trabajo');
        $codigo = $request->input('codigo');
        $fecha = $request->input('fecha');
        $codigo_padre = $request->input('codigo_padre');
        $notas = $request->input('notas');
        $motivo_rechazo = $request->input('motivo_rechazo');
        $texto_otros = $request->input('texto_otros');
        $sustituido_por = $request->input('sustituido_por');
        $rutas = []; 
        if ($request->hasFile('anexos')) {
            foreach ($request->file('anexos') as $archivo) {
                $rutaArchivo = $archivo->storeAs(
                    'anexos/'.$idhdp.'/'.$revision, 
                    $archivo->getClientOriginalName(), 
                    'public'
                );
                $rutas[] = $rutaArchivo; 
            }
        }
        $rutaString = implode(',', $rutas);

        $ventas = Ventas::where('idhdp', $idhdp)
                    ->where('revision', $revision)
                    ->first();

        if (!$ventas) {
            $ventas = new Ventas();
            $ventas->idhdp = $idhdp;
            $ventas->revision = $revision;
        }
        
        $ventas->aceptada = $aceptada;
        $ventas->cantidad = $cantidad;
        $ventas->oferta = $oferta;
        $ventas->plazo = $plazo;
        $ventas->texto = $texto;
        $ventas->trabajo = $trabajo;
        $ventas->codigo = $codigo;
        $ventas->fecha = $fecha;
        $ventas->codigo_padre = $codigo_padre;
        $ventas->notas = $notas;
        $ventas->motivo_rechazo = $motivo_rechazo;
        $ventas->texto_otros = $texto_otros;
        $ventas->sustituido_por = $sustituido_por;
        $ventas->anexos = $rutaString;
        $ventas->save();

        $hdp = Hdp::where('numero', $idhdp)
                    ->where('revision', $revision)
                    ->first();
        $hdp->secuencia = 6;
        $hdp->save();

        return redirect()->route('hdps')->with('success', '¡Formulario enviado con éxito!');
    }

    public function procesarImasd2(Request $request)
    {

         $idhdp = $request->input('idhdp');
        $revision =    $request->input('revision');
        $plan_distribucion = $request->input('plan_distribucion');
        $establecido_plano = $request->input('establecido_plano');
        $revision_plano = $request->input('revision_plano');
        $fecha_distribucion = $request->input('fecha_distribucion');
        $codigo_comercial = $request->input('codigo_comercial');
        $semielaborados = $request->input('semielaborados');
        $notas = $request->input('notas');
        $anexos = $request->file('anexos'); 
        $rutas = []; 
        if ($request->hasFile('anexos')) {
            foreach ($request->file('anexos') as $archivo) {
                $rutaArchivo = $archivo->storeAs(
                    'anexos/'.$idhdp.'/'.$revision, 
                    $archivo->getClientOriginalName(), 
                    'public'
                );
                $rutas[] = $rutaArchivo; 
            }
        }
        $rutaString = implode(',', $rutas);


        $imasd2 = Imasd2::where('idhdp', $idhdp)
                    ->where('revision', $revision)
                    ->first();

        if (!$imasd2) {
            $imasd2 = new Imasd2();
            $imasd2->idhdp = $idhdp;
            $imasd2->revision = $revision;
        }
        
        $imasd2->plan_distribucion = $plan_distribucion;
        $imasd2->establecido_plano = $establecido_plano;
        $imasd2->revision_plano = $revision_plano;
        $imasd2->fecha_distribucion = $fecha_distribucion;
        $imasd2->codigo_comercial = $codigo_comercial;
        $imasd2->semielaborados = $semielaborados;
        $imasd2->notas = $notas;
        $imasd2->anexos = $rutaString;
        $imasd2->save();

        $hdp = Hdp::where('numero', $idhdp)
                    ->where('revision', $revision)
                    ->first();
        $hdp->secuencia = 7;
        $hdp->save();
        
        return redirect()->route('hdps')->with('success', '¡Formulario enviado con éxito!');
    }

    public function procesarCalidad(Request $request)
    {

        $idhdp = $request->input('idhdp');
        $revision =    $request->input('revision');
        $revision_serie_fecha = $request->input('revision_serie_fecha');
        $distribucion_copias = $request->input('distribucion_copias');
        $notas = $request->input('notas');       
        $rutas = []; 
        if ($request->hasFile('anexos')) {
            foreach ($request->file('anexos') as $archivo) {
                $rutaArchivo = $archivo->storeAs(
                    'anexos/'.$idhdp.'/'.$revision, 
                    $archivo->getClientOriginalName(), 
                    'public'
                );
                $rutas[] = $rutaArchivo; 
            }
        }
        $rutaString = implode(',', $rutas);

        $calidad = Calidad::where('idhdp', $idhdp)
                    ->where('revision', $revision)
                    ->first();

        if (!$calidad) {
            $calidad = new Calidad();
            $calidad->idhdp = $idhdp;
            $calidad->revision = $revision;
        }
        
        $calidad->revision_serie_fecha = $revision_serie_fecha;
        $calidad->distribucion_copias = $distribucion_copias;
        $calidad->notas = $notas;
        $calidad->anexos = $rutaString;
        $calidad->save();

        $hdp = Hdp::where('numero', $idhdp)
                    ->where('revision', $revision)
                    ->first();
        $hdp->secuencia = 8;
        $hdp->aprobado = true;
        $hdp->save();

        return redirect()->route('hdps')->with('success', '¡Formulario enviado con éxito!');
    }

    public function rechazar(Request $request)
    {

        $idhdp = $request->input('numero');
        $revision = $request->input('revision');
        $motivo_rechazo = $request->input('motivo_rechazo');
        $hdp = Hdp::where('numero', $idhdp)
                    ->where('revision', $revision)
                    ->first();
        $hdp->rechazado = true;
        $hdp->motivo_rechazo = $motivo_rechazo;

        $hdp->save();

        return redirect()->route('hdps')->with('success', '¡Formulario rechazado con éxito!');
    }

    public function devolver(Request $request)
    {

        $idhdp = $request->input('numero');
        $revision = $request->input('revision');
        $secuencia = $request->input('secuencia') - 1;
        
        $hdp = Hdp::where('numero', $idhdp)
                    ->where('revision', $revision)
                    ->first();
        $hdp->secuencia = $secuencia;
        $hdp->save();

        return redirect()->route('hdps')->with('success', '¡Formulario devuelto con éxito!');
    }

}
