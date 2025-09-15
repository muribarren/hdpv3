@php
    $puedeEditar = (in_array($loged_user->id, [2, 3]) || $loged_user->id == $imasd->user_id);
@endphp


<form method="POST" action="{{ route('procesar')}}" enctype="multipart/form-data">
    @csrf
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Datos</h3>
        <input type="hidden" name="tipo" value="imasd">
        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="idhdp" name="idhdp" value="{{ $imasd->idhdp ?? '' }}" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="idhdp" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">NUmero</label>
            @error('idhdp')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>
        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="revision" name="revision" value="{{ $imasd->revision ?? '' }}"  required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="revision" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">revision</label>
            @error('revision')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>


        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="clase" name="clase" value="{{ $imasd->clase ?? '' }}"  maxlength="250"  {{ $puedeEditar ? '' : 'readonly' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="clase" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Clase</label>
            @error('clase')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            
            <label for="ensayo_hecho" class="text-sm text-gray-700 dark:text-gray-400">
                <input type="hidden" name="ensayo_hecho" value="0">
                <input type="checkbox" id="ensayo_hecho" value = "1" {{ $puedeEditar ? '' : 'disabled' }} name="ensayo_hecho" @if ($imasd->ensayo_hecho) checked @endif  class="mr-2 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 " {{ old('ensayo_hecho') ? 'checked' : '' }} />
                ¿Se ha hecho ensayo?
            </label>
            @error('ensayo_hecho')
                <div class="error-message text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            
            <label for="plano_provisional" class="text-sm text-gray-700 dark:text-gray-400">
                <input type="hidden" name="plano_provisional" value="0">
                <input type="checkbox" id="plano_provisional" value = "1" {{ $puedeEditar ? '' : 'disabled' }} name="plano_provisional" @if ($imasd->plano_provisional) checked @endif  class="mr-2 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 " {{ old('plano_provisional') ? 'checked' : '' }} />
                Plano provisional
            </label>
            @error('plano_provisional')
                <div class="error-message text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            
            <label for="realizado_prototipo" class="text-sm text-gray-700 dark:text-gray-400">
                <input type="hidden" name="realizado_prototipo" value="0">
                <input type="checkbox" id="realizado_prototipo" name="realizado_prototipo" {{ $puedeEditar ? '' : 'disabled' }} @if ($imasd->realizado_prototipo) checked @endif class="mr-2 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" {{ old('realizado_prototipo') ? 'checked' : '' }}/>
                Realizado prototipo
            </label>
            @error('realizado_prototipo')
                <div class="error-message text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <label for="enviado_a_cliente">Enviado al cliente el:</label>
            <input 
                type="date" 
                id="enviado_a_cliente" 
                name="enviado_a_cliente" 
                {{ $puedeEditar ? '' : 'readonly' }}
                value="{{ old('enviado_a_cliente', $imasd?->enviado_a_cliente ? \Carbon\Carbon::parse($imasd->enviado_a_cliente)->format('Y-m-d') : '') }}"
            >
            @error('enviado_a_cliente')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group relative w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            
            <label for="paso_siguiente">Paso siguiente:</label>
            <select id="paso_siguiente" name="paso_siguiente" {{ $puedeEditar ? '' : 'disabled' }}>
                <option value="">-- Selecciona una opción --</option>
                <option value="produccion" {{ $imasd->paso_siguiente  == "produccion" ? 'selected' : '' }} >Producción</option>
                <option value="compras" {{ $imasd->paso_siguiente  == "compras" ? 'selected' : '' }}>Compras</option>
                <option value="produccioncompras" {{ $imasd->paso_siguiente  == "produccioncompras" ? 'selected' : '' }}>Producción y compras</option>
            </select>

            @error('paso_siguiente')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <textarea id="notas" name="notas" {{ $puedeEditar ? '' : 'readonly' }} maxlength="500" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" placeholder=" " >{{ $imasd -> notas}}</textarea>
            <label for="notas" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Notas</label>
            @error('notas')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  
    </div>
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Anexos</h3>
        @if (empty($imasd->anexos))
        <div id="anexos-container" class="w-full px-3 mt-6">
            <div class="form-group anexo-item">
                <label>Anexo 1:</label>
                <input type="file" id="anexos" name="anexos[]" class="anexo-input">
            </div>
        </div>
        @else
            <h4>Lista de anexos:</h4>
            <ul class="list-disc ml-6 mt-2">
                @foreach (explode(',', $imasd->anexos) as $archivo)
                    <li>
                        <a href="{{ asset('storage/' . $archivo) }}" target="_blank" class="text-blue-600 underline">
                            {{ basename($archivo) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <br/>
     @if(!$hdp->rechazado && $hdp->secuencia <= 1 && $puedeEditar)
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Enviar
        </button>   
    @endif
</form>
<br/>

<form id="rechazarForm" action="{{ route('rechazar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="numero" value="{{ $hdp->numero }}">
    <input type="hidden" name="revision" value="{{ $hdp->revision }}">
    <input type="hidden" name="rechazado" value="1">
    <!-- Aquí guardaremos el motivo -->
    <input type="hidden" name="motivo_rechazo" id="motivo_rechazo" value="">

    <button type="button" id="btnRechazar" class="bg-red-600 text-white px-4 py-2 rounded"
        @if(!$hdp->rechazado && $hdp->secuencia <= 1 && $puedeEditar))  style="display:none;" @endif>
        Rechazar
    </button>
</form>


<!--<form action="{{ route('devolver') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="numero" value="{{ $hdp->numero }}">
    <input type="hidden" name="revision" value="{{ $hdp->revision }}">
    <input type="hidden" name="secuencia" value="{{ $hdp->secuencia }}">
    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded"
        @if($hdp->rechazado || $hdp->secuencia > 1) style="display:none;" @endif>
        Rechazar
    </button>
</form>-->

<!-- <button class="bg-green-600 text-white px-4 py-2 rounded" @if($hdp->rechazado || $hdp->aprobado) style="display:none;" @endif>Editar</button>-->



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

    document.getElementById('btnRechazar').addEventListener('click', function() {
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
