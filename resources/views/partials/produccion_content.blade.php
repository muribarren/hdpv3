<form method="POST" action="{{ route('procesar')}}" enctype="multipart/form-data">
    @csrf
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Datos</h3>
        <input type="hidden" name="tipo" value="produccion">

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="idhdp" name="idhdp" value="{{ $produccion->idhdp ?? '' }}"    {{ $participante->produccion != $loged_user->id  ? 'readonly' : '' }} required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="idhdp" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">NUmero</label>
            @error('idhdp')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="revision" name="revision" value="{{ $produccion->revision ?? '' }}"     {{ $participante->produccion != $loged_user->id  ? 'readonly' : '' }} required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="revision" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">revision</label>
            @error('revision')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            
            <label for="inversion_necesaria" class="text-sm text-gray-700 dark:text-gray-400">
                <input type="hidden" name="inversion_necesaria" value="0">
                <input type="checkbox" id="inversion_necesaria" value = "1" {{ $participante->produccion != $loged_user->id ? 'disabled' : '' }} name="inversion_necesaria" @if ($produccion->inversion_necesaria) checked @endif  class="mr-2 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 " {{ old('inversion_necesaria') ? 'checked' : '' }} />
                Inversion necesaria
            </label>
            @error('inversion_necesaria')
                <div class="error-message text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div id="sustitucionGroup" class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="importe_inversion" name="importe_inversion" maxlength="250" value="{{ $produccion -> importe_inversion}}"  {{ $participante->produccion != $loged_user->id  ? 'readonly' : '' }}  class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="importe_inversion" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Importe inversión</label>
            @error('importe_inversion')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="material" name="material" value="{{ $produccion->material ?? '' }}"   maxlength="250"  {{ $participante->produccion != $loged_user->id  ? 'readonly' : '' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="material" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Material</label>
            @error('material')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="acabado" name="acabado" value="{{ $produccion->acabado ?? '' }}"  maxlength="250"   {{ $participante->produccion != $loged_user->id  ? 'readonly' : '' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="acabado" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Acabado</label>
            @error('acabado')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="peso_pieza" name="peso_pieza" value="{{ $produccion->peso_pieza ?? '' }}"   maxlength="250"  {{ $participante->produccion != $loged_user->id  ? 'readonly' : '' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="peso_pieza" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Peso pieza</label>
            @error('peso_pieza')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="estructura" name="estructura" value="{{ $produccion->estructura ?? '' }}"  maxlength="250"    {{ $participante->produccion != $loged_user->id  ? 'readonly' : '' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="estructura" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Estructura</label>
            @error('estructura')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="igual_a_estructura" name="igual_a_estructura" value="{{ $produccion->igual_a_estructura ?? '' }}"  maxlength="250"   {{ $participante->produccion != $loged_user->id  ? 'readonly' : '' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="igual_a_estructura" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Igual a estructura</label>
            @error('igual_a_estructura')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="inversion_troquel" name="inversion_troquel" value="{{ $produccion->inversion_troquel ?? '' }}"  maxlength="250"  {{ $participante->produccion != $loged_user->id  ? 'readonly' : '' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="inversion_troquel" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Inversión en troquel / molde</label>
            @error('inversion_troquel')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>
        
        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <label for="plazo">Plazo de realización de prod.:</label>
            <input type="date" id="plazo" name="plazo"  {{ $participante->produccion != $loged_user->id  ? 'readonly' : '' }} value="{{ old('plazo', isset($produccion->plazo) && $produccion->plazo ? \Carbon\Carbon::parse($produccion->plazo)->format('Y-m-d') : '') }}">
            @error('plazo')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <textarea type="text" id="notas" name="notas" maxlength="500" {{ $participante->produccion != $loged_user->id  ? 'readonly' : '' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  readonly placeholder=" " >{{ $produccion->notas ?? '' }}</textarea>
            <label for="notas" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Notas</label>
            @error('notas')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>
    </div>
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Anexos</h3>
        @if (empty($produccion->anexos))
        <div id="anexos-container" class="w-full px-3 mt-6">
            <div class="form-group anexo-item">
                <label>Anexo 1:</label>
                <input type="file" id="anexos" name="anexos[]" class="anexo-input">
            </div>
        </div>
        @else
            <h4>Lista de anexos:</h4>
            <ul class="list-disc ml-6 mt-2">
                @foreach (explode(',', $produccion->anexos) as $archivo)
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

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded"  @if($hdp->rechazado || $hdp->secuencia > 3 ||  $participante->produccion != $loged_user->id) style="display:none;" @endif>Enviar</button>
    
</form>

<form id="rechazarForm" action="{{ route('rechazar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="numero" value="{{ $hdp->numero }}">
    <input type="hidden" name="revision" value="{{ $hdp->revision }}">
    <input type="hidden" name="rechazado" value="1">
    <!-- Aquí guardaremos el motivo -->
    <input type="hidden" name="motivo_rechazo" id="motivo_rechazo" value="">

    <button type="button" id="btnRechazar" class="bg-red-600 text-white px-4 py-2 rounded"
        @if($hdp->rechazado || $hdp->secuencia > 3 ||  $participante->produccion != $loged_user->id) style="display:none;" @endif>
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



        //Añadir el event listener al campo inicial al cargar la página
        const initialInput = anexosContainer.querySelector('.anexo-input');
        addChangeListenerToInput(initialInput);

        const checkbox = document.getElementById('inversion_necesaria');
        const grupoSustitucion = document.getElementById('sustitucionGroup');
        const inputSustitucion = document.getElementById('importe_inversion');

        function actualizarVisibilidad() {
            if (checkbox.checked) {
                grupoSustitucion.style.display = 'block'; // Muestra el div
                inputSustitucion.setAttribute('required', 'required'); // Lo hace obligatorio
            } else {
                grupoSustitucion.style.display = 'none'; // Oculta el div
                inputSustitucion.removeAttribute('required'); // No obligatorio
                inputSustitucion.value = ''; // Borra el texto si se oculta
            }
        }

        // Ejecutar al cargar la página (por si ya venía marcado con old())
        actualizarVisibilidad();

        // Escuchar cambios en el checkbox
        checkbox.addEventListener('change', actualizarVisibilidad);
    });

</script>