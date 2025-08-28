{{-- resources/views/partials/formulario_content.blade.php --}}

{{-- Mostrar mensajes de éxito --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Mostrar errores de validación --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1 class="text-4xl font-bold">
    HDP {{ $hdp ->numero }} REV {{ $hdp ->revision }}
</h1>

<h1 class="text-4xl font-bold">{{ $hdp ->titulo }}</h1>
@if($hdp->rechazado)
    <h1 class="text-red-600 text-4xl font-bold">RECHAZADO. Motivo: {{ $hdp->motivo_rechazo }}</h1>
   <x-nav-link 
        :href="route('nuevo', ['numero'=> $hdp->numero , 'revision' => $hdp ->revision + 1])" 
        :active="request()->routeIs('nuevo')" 
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-200"
    >
        {{ __('CREAR REVISIÓN') }}
    </x-nav-link>
@endif

@if($hdp->aprobado)
    <h1 class="text-green-600 text-4xl font-bold">APROBADO</h1>
   <x-nav-link 
        :href="route('nuevo', ['numero'=> $hdp->numero , 'revision' => $hdp ->revision + 1])" 
        :active="request()->routeIs('nuevo')" 
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-200"
    >
        {{ __('CREAR REVISIÓN') }}
    </x-nav-link>
@endif

<div class="w-full max-w-4xl mx-auto mt-8">

    <div class="border-b border-gray-300 flex space-x-4" id="tabs">
        <button onclick="openTab('clientes', this)" class="tab-btn text-blue-600 border-b-2 border-blue-600 font-semibold py-2 px-4">Cliente solicitante</button>
        <button onclick="openTab('imasd1', this)" @if($hdp->rechazado && $hdp->secuencia == 1) style="display:none;" @endif class="tab-btn text-gray-600 hover:text-blue-600 hover:border-blue-600 border-b-2 border-transparent py-2 px-4">I+D</button>
        <button onclick="openTab('produccioncompras', this)" @if($hdp->secuencia < 2 || ($hdp->rechazado && $hdp->secuencia == 2) || $imasd->paso_siguiente == "compras") style="display:none;" @endif class="tab-btn text-gray-600 hover:text-blue-600 hover:border-blue-600 border-b-2 border-transparent py-2 px-4">Producción</button>
        <button onclick="openTab('xxx', this)" @if($hdp->secuencia < 3 || ($hdp->rechazado && $hdp->secuencia == 3) || $imasd->paso_siguiente == "produccion") style="display:none;" @endif class="tab-btn text-gray-600 hover:text-blue-600 hover:border-blue-600 border-b-2 border-transparent py-2 px-4">Compras</button>
        <button onclick="openTab('yyy', this)" @if($hdp->secuencia < 4 || ($hdp->rechazado && $hdp->secuencia == 4)) style="display:none;" @endif class="tab-btn text-gray-600 hover:text-blue-600 hover:border-blue-600 border-b-2 border-transparent py-2 px-4">Costos</button>
        <button onclick="openTab('zzz', this)" @if($hdp->secuencia < 5 || ($hdp->rechazado && ($hdp->secuencia == 5 ))) style="display:none;" @endif class="tab-btn text-gray-600 hover:text-blue-600 hover:border-blue-600 border-b-2 border-transparent py-2 px-4">Ventas</button>
        <button onclick="openTab('imasd2', this)" @if($hdp->secuencia < 6 || ($hdp->rechazado && $hdp->secuencia == 6)) style="display:none;" @endif class="tab-btn text-gray-600 hover:text-blue-600 hover:border-blue-600 border-b-2 border-transparent py-2 px-4">I+D 2 </button>
        <button onclick="openTab('aaa', this)" @if($hdp->secuencia < 7 || ($hdp->rechazado && $hdp->secuencia == 7)) style="display:none;" @endif class="tab-btn text-gray-600 hover:text-blue-600 hover:border-blue-600 border-b-2 border-transparent py-2 px-4">Calidad</button>
    </div>


    
    {{-- La pestaña 'clientes' NO debe tener 'hidden' si quieres que sea la predeterminada --}}
    <div id="clientes" class="tab-content">
        @include('partials.cliente_content', ['hdp' => $hdp, 'usuarios' => $usuarios])
    </div>

    {{-- Todas las demás pestañas DEBEN tener la clase 'hidden' inicialmente --}}
    <div id="imasd1" class="tab-content hidden">
        @include('partials.imasd_content', ['hdp' => $hdp, 'usuarios' => $usuarios])
    </div>

    <div id="produccioncompras" class="tab-content hidden">
        @include('partials.produccion_content', ['hdp' => $hdp, 'usuarios' => $usuarios])
    </div>

    <div id="xxx" class="tab-content hidden">
        @include('partials.compras_content', ['hdp' => $hdp, 'usuarios' => $usuarios])
    </div>

    <div id="yyy" class="tab-content hidden">
        @include('partials.costos_content', ['hdp' => $hdp, 'usuarios' => $usuarios])
    </div>

    <div id="zzz" class="tab-content hidden">
        @include('partials.ventas_content', ['hdp' => $hdp, 'usuarios' => $usuarios])
    </div>

    <div id="imasd2" class="tab-content hidden">
        @include('partials.imasd2_content', ['hdp' => $hdp, 'usuarios' => $usuarios])
    </div>

    <div id="aaa" class="tab-content hidden">
        @include('partials.calidad_content', ['hdp' => $hdp, 'usuarios' => $usuarios])
    </div>

    <div class="border-b border-gray-300 flex space-x-4" id="tabs">
        <div class="w-full border border-black rounded-lg p-6 mt-6">
            <h3 class="text-lg font-semibold mb-6">Secuencia</h3>

            <p>

                @if($hdp->secuencia >= 1)
                    <span class="text-gray-600"> - HDP creado por {{ $usuarios->firstWhere('id', $participante->creador)->name }} el {{ $hdp->created_at->format('Y-m-d') }}</span><br/>
                @endif
                @if($hdp->secuencia >= 2 && isset($participante->imasd))
                    <span class="text-blue-600 font-semibold"> - Validado por dpto. I+D. {{ $usuarios->firstWhere('id', $participante->imasd)->name }} {{ $imasd->created_at->format('Y-m-d') }}</span> <br/>
                @elseif($hdp->secuencia == 1)
                    <n>- Pendiente de validación por dpto. I+D: {{ $usuarios->firstWhere('id', $participante->imasd)->name }}</n><br/>
                @endif
                @if($hdp->secuencia >= 3 && isset($participante->produccion))
                    <span class="text-blue-600 font-semibold"> - Validado por dpto. producción: {{ $usuarios->firstWhere('id', $participante->produccion)->name}} {{ optional($produccion->created_at)->format('Y-m-d') }}</span><br/>
                @elseif ($hdp->secuencia == 2)
                    <n>- Pendiente de validación por dpto. producción: {{ $usuarios->firstWhere('id', $participante->compras)->name }}</n><br/>
                @endif
                
                @if($hdp->secuencia >= 4 && isset($participante->compras))
                    <span class="text-blue-600 font-semibold"> - Validado por dpto. compras: {{ $usuarios->firstWhere('id', $participante->compras)->name }} {{ optional($compras->created_at)->format('Y-m-d') }}</span><br/> 
                @elseif ($hdp->secuencia == 3)
                    <n>- Pendiente de validación por dpto. compras: {{ $usuarios->firstWhere('id', $participante->costos)->name }}</n><br/>
                @endif
                @if($hdp->secuencia >= 5 && isset($participante->costos))
                    <span class="text-blue-600 font-semibold"> - Validado por dpto. costos: {{ $usuarios->firstWhere('id', $participante->costos)->name }} {{ $costos->created_at->format('Y-m-d') }}</span><br/> 
                @elseif ($hdp->secuencia == 4)
                    <n>- Pendiente de validación por dpto. costos: {{$usuarios->firstWhere('id', $participante->ventas)->name }}</n><br/>
                @endif    
                @if($hdp->secuencia >= 6 && isset($participante->ventas))
                    <span class="text-blue-600 font-semibold"> - Validado por dpto. ventas: {{ $usuarios->firstWhere('id', $participante->ventas)->name }} {{ $ventas->created_at->format('Y-m-d') }}</span><br/> 
                @elseif ($hdp->secuencia == 5)
                    <n>- Pendiente de validación por dpto. ventas: {{ $usuarios->firstWhere('id', $participante->imasd)->name }}</n><br/>
                @endif
                @if($hdp->secuencia >= 7 && isset($participante->imasd2))
                    <span class="text-blue-600 font-semibold"> - Validado por depart dpto.amento I+D: {{ $usuarios->firstWhere('id', $participante->imasd2)->name }} {{ $imasd2->created_a->format('Y-m-d') }}</span><br/>
                @elseif ($hdp->secuencia == 6)
                    <n>- Pendiente de validación por dpto. I+D: {{ $usuarios->firstWhere('id', $participante->calidad)->name }}</n><br/>
                @endif
                @if($hdp->secuencia >= 8 && isset($participante->calidad))
                    <span class="text-green-600 font-semibold"><br/><n> - HDP COMPLETADO. Validado por dpto. de calidad por {{ $usuarios->firstWhere('id', $participante->calidad)->name }} {{ $calidad->created_at->format('Y-m-d') }}</n></span>
                @endif  
            </p>

    </div>


</div>
<!-- JS para tabs -->
<script>
    function openTab(tabId, clickedButton) {
        
        const contents = document.querySelectorAll('.tab-content');
        const buttons = document.querySelectorAll('.tab-btn');

        // Oculta todos los contenidos de las pestañas
        contents.forEach(c => c.classList.add('hidden'));

        // Restablece el estilo de todos los botones de las pestañas
        buttons.forEach(b => {
            b.classList.remove('text-blue-600', 'border-blue-600', 'font-semibold');
            b.classList.add('text-gray-600', 'border-transparent');
        });

        // Muestra el contenido de la pestaña seleccionada
        document.getElementById(tabId).classList.remove('hidden');

        // Aplica el estilo activo directamente al botón clicado
        clickedButton.classList.add('text-blue-600', 'border-blue-600', 'font-semibold');
        clickedButton.classList.remove('text-gray-600', 'border-transparent');
    }

    // Asegura que solo la primera pestaña esté activa al cargar la página
    document.addEventListener('DOMContentLoaded', (event) => {
        const initialActiveTabId = 'clientes'; // ID de la pestaña que debe estar activa al inicio
        // Busca el botón cuya función onclick contenga el ID de la pestaña inicial
        // Usamos un selector más robusto para encontrar el botón correcto
        const initialActiveButton = document.querySelector(`button[onclick*="openTab('${initialActiveTabId}')"]`);
        if (initialActiveButton) {
            openTab(initialActiveTabId, initialActiveButton);
        }
    });
</script>