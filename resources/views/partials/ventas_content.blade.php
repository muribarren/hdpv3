@php
    $puedeEditar = (in_array($loged_user->id, [2, 3]) || $loged_user->id == $ventas->user_id);
@endphp

<form method="POST" action="{{ route('procesar')}}" enctype="multipart/form-data">
    @csrf
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Datos</h3>
        <input type="hidden" name="tipo" value="ventas">

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="idhdp" name="idhdp" value="{{ $ventas->idhdp ?? '' }}"     required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="idhdp" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">NUmero</label>
            @error('idhdp')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="revision" name="revision" value="{{ $ventas->revision ?? '' }}"  required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="revision" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">revision</label>
            @error('revision')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            
            <label for="aceptada" class="text-sm text-gray-700 dark:text-gray-400">
                <input type="hidden" name="aceptada" value="0">
                <input type="checkbox" id="aceptada" value = "1"  {{ $puedeEditar ? '' : 'disabled' }} name="aceptada" @if ($ventas->aceptada) checked @endif  class="mr-2 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 " {{ old('aceptada') ? 'checked' : '' }} />
                Aceptada
            </label>
            @error('aceptada')
                <div class="error-message text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="cantidad" name="cantidad" value="{{ $ventas->cantidad ?? '' }}"  {{ $puedeEditar ? '' : 'readonly' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" placeholder=" " />
            <label for="cantidad" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cantidad</label>
            @error('cantidad')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="oferta" name="oferta" value="{{ $ventas->oferta ?? '' }}" maxlength="250" {{ $puedeEditar ? '' : 'readonly' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" placeholder=" " />
            <label for="oferta" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Oferta</label>
            @error('oferta')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <label for="plazo">Plazo</label>
            <input type="date" id="plazo" name="plazo" {{ $puedeEditar ? '' : 'readonly' }} value="{{ old('plazo', isset($ventas->plazo) && $ventas->plazo ? \Carbon\Carbon::parse($ventas->plazo)->format('Y-m-d') : '') }}">
            @error('plazo')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="texto" name="texto" value="{{ $ventas->texto ?? '' }}" maxlength="250" {{ $puedeEditar ? '' : 'readonly' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" placeholder=" " />
            <label for="texto" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Texto</label>
            @error('texto')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="trabajo" name="trabajo" value="{{ $ventas->trabajo ?? '' }}" maxlength="250" {{ $puedeEditar ? '' : 'readonly' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" placeholder=" " />
            <label for="trabajo" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Trabajo</label>
            @error('trabajo')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="codigo" name="codigo" value="{{ $ventas->codigo ?? '' }}" maxlength="250" {{ $puedeEditar ? '' : 'readonly' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" placeholder=" " />
            <label for="codigo" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Código</label>
            @error('codigo')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" {{ $puedeEditar ? '' : 'readonly' }} value="{{ old('fecha', isset($ventas->fecha) && $ventas->fecha ? \Carbon\Carbon::parse($ventas->fecha)->format('Y-m-d') : '') }}">
                @error('fecha')
                    <div class="error-message">{{ $message }}</div>
                @enderror       
            </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="codigo_padre" name="codigo_padre" value="{{ $ventas->codigo_padre ?? '' }}" maxlength="250" {{ $puedeEditar ? '' : 'readonly' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" placeholder=" " />
            <label for="codigo_padre" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Código padre</label>
            @error('codigo_padre')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

       <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <textarea type="text" id="notas" name="notas" {{ $puedeEditar ? '' : 'readonly' }} maxlength="500" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" placeholder=" " >{{ $ventas->notas ?? '' }}</textarea>
            <label for="notas" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Notas</label>
            @error('notas')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="motivo_rechazo" name="motivo_rechazo" value="{{ $ventas->motivo_rechazo ?? '' }}" maxlength="250" {{ $puedeEditar ? '' : 'readonly' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" placeholder=" " />
            <label for="motivo_rechazo" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Oferta</label>
            @error('motivo_rechazo')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="texto_otros" name="texto_otros" value="{{ $ventas->texto_otros ?? '' }}" maxlength="250" {{ $puedeEditar ? '' : 'readonly' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" placeholder=" " />
            <label for="texto_otros" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Motivo de rechazo</label>
            @error('texto_otros')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="sustituido_por" name="sustituido_por" value="{{ $ventas->sustituido_por ?? '' }}" maxlength="250" {{ $puedeEditar ? '' : 'readonly' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" placeholder=" " />
            <label for="sustituido_por" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Sustituido por</label>
            @error('sustituido_por')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>
    </div>  
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Anexos</h3>
        @if (empty($ventas->anexos))
        <div id="anexos-container" class="w-full px-3 mt-6">
            <div class="form-group anexo-item">
                <label>Anexo 1:</label>
                <input type="file" id="anexos" name="anexos[]" class="anexo-input">
            </div>
        </div>
        @else
            <h4>Lista de anexos:</h4>
            <ul class="list-disc ml-6 mt-2">
                @foreach (explode(',', $ventas->anexos) as $archivo)
                    <li>
                        <a href="{{ asset('storage/' . $archivo) }}" target="_blank" class="text-blue-600 underline">
                            {{ basename($archivo) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    
       @if(!$hdp->rechazado && $hdp->secuencia <= 5 && $puedeEditar)
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Enviar
        </button>   
    @endif
  
</form>

<form id="rechazarForm" action="{{ route('rechazar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="numero" value="{{ $hdp->numero }}">
    <input type="hidden" name="revision" value="{{ $hdp->revision }}">
    <input type="hidden" name="rechazado" value="1">
    <!-- Aquí guardaremos el motivo -->
    <input type="hidden" name="motivo_rechazo" id="motivo_rechazo" value="">

    <button type="button" id="btnRechazar5" class="bg-red-600 text-white px-4 py-2 rounded"
        @if(!(!$hdp->rechazado && $hdp->secuencia <= 5 && $puedeEditar )) style="display:none;" @endif>
        Rechazar
    </button>
</form>

<script>
     document.addEventListener('DOMContentLoaded', function() {
        const anexosContainer = document.getElementById('anexos-container');
        let anexoCount = 1; // Para el contador en la etiqueta

        // Función para añadir un nuevo input de anexo
        function addNewAnexoInput() {
            anexoCount++;
            const newAnexoDiv = document.createElement('div');
            newAnexoDiv.classList.add('form-group', 'anexo-item');
            newAnexoDiv.innerHTML = `
                <label>Anexo ${anexoCount}:</label>
                <input type="file" id="anexos${anexoCount}" name="anexos[]" class="anexo-input">
            `;
            anexosContainer.appendChild(newAnexoDiv);
            
            // ¡IMPORTANTE! Vuelve a añadir el 'event listener' al nuevo input
            addChangeListenerToInput(newAnexoDiv.querySelector('.anexo-input'));
        }

        // Función para añadir el event listener a un input de anexo
        function addChangeListenerToInput(inputElement) {
            inputElement.addEventListener('change', function() {
                // Solo añade un nuevo campo si el campo actual tiene un archivo seleccionado
                // Y si NO es el último campo vacío, para evitar añadir infinitos campos
                const lastInput = anexosContainer.lastElementChild.querySelector('.anexo-input');
                if (this.files.length > 0 && this === lastInput) {
                    addNewAnexoInput();
                }
            });
        }

    document.getElementById('btnRechazar5').addEventListener('click', function() {
        // Abrir popup para que el usuario escriba un motivo
        const motivo = prompt("Por favor, escribe el motivo del rechazo:");
        
        if (motivo !== null && motivo.trim() !== "") {
            // Guardar el motivo en el input hidden
            document.getElementById('motivo_rechazo').value = motivo.trim();
            // Enviar el formulario
            document.getElementById('rechazarForm').submit();
        } else {
            alert("Debes escribir un motivo para poder rechazar.");
        }
    });
     });
</script>

