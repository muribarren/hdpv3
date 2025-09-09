<form method="POST" action="{{ route('procesar')}}" enctype="multipart/form-data">
    @csrf
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Datos</h3>
        <input type="hidden" name="tipo" value="calidad">

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="idhdp" name="idhdp" value="{{ $calidad->idhdp ?? '' }}"   {{ $participante->calidad != $loged_user->id  ? 'readonly' : '' }} required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="idhdp" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">NUmero</label>
            @error('idhdp')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="revision" name="revision" value="{{ $calidad->revision ?? '' }}"   {{ $participante->calidad != $loged_user->id  ? 'readonly' : '' }} required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="revision" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">revision</label>
            @error('revision')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <label for="revision_serie_fecha">Revisión serie 0 fecha</label>
            <input type="date" id="revision_serie_fecha" name="revision_serie_fecha" {{ $participante->calidad != $loged_user->id || $loged_user->id == "2" || $loged_user->id == "3" ? 'readonly' : '' }} value="{{ old('revision_serie_fecha', isset($calidad->revision_serie_fecha) && $calidad->revision_serie_fecha ? \Carbon\Carbon::parse($calidad->revision_serie_fecha)->format('Y-m-d') : '') }}">
            @error('revision_serie_fecha')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>



        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            
            <label for="distribucion_copias" class="text-sm text-gray-700 dark:text-gray-400">
                <input type="hidden" name="distribucion_copias" value="0">
                <input type="checkbox" id="distribucion_copias" value = "1" {{ $participante->calidad != $loged_user->id || $loged_user->id == "2" || $loged_user->id == "3" ? 'readonly' : '' }} name="distribucion_copias" @if ($calidad->distribucion_copias) checked @endif  class="mr-2 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 " {{ old('distribucion_copias') ? 'checked' : '' }} />
                Distribución de copias según HER 0001.08
            </label>
            @error('distribucion_copias')
                <div class="error-message text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <textarea id="notas" name="notas" maxlength="500" {{ $participante->calidad != $loged_user->id || $loged_user->id == "2" || $loged_user->id == "3" ? 'readonly' : '' }} class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"   placeholder=" " >{{ $calidad->notas ?? '' }}</textarea>
            <label for="notas" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Notas</label>
            @error('notas')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>
    </div>
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Anexos</h3>
        @if (empty($calidad->anexos))
        <div id="anexos-container" class="w-full px-3 mt-6">
            <div class="form-group anexo-item">
                <label>Anexo 1:</label>
                <input type="file" id="anexos" name="anexos[]" class="anexo-input">
            </div>
        </div>
        @else
            <h4>Lista de anexos:</h4>
            <ul class="list-disc ml-6 mt-2">
                @foreach (explode(',', $calidad->anexos) as $archivo)
                    <li>
                        <a href="{{ asset('storage/' . $archivo) }}" target="_blank" class="text-blue-600 underline">
                            {{ basename($archivo) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded" @if($hdp->rechazado || $hdp->secuencia > 7 ||  $participante->calidad != $loged_user->id) style="display:none;" @endif>Aprobar</button>

</form>
<form id="rechazarForm" action="{{ route('rechazar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="numero" value="{{ $hdp->numero }}">
    <input type="hidden" name="revision" value="{{ $hdp->revision }}">
    <input type="hidden" name="rechazado" value="1">
    <!-- Aquí guardaremos el motivo -->
    <input type="hidden" name="motivo_rechazo" id="motivo_rechazo" value="">

    <button type="button" id="btnRechazar" class="bg-red-600 text-white px-4 py-2 rounded"
        @if($hdp->rechazado || $hdp->secuencia > 7 ||  $participante->calidad != $loged_user->id || $loged_user->id != "2" || $loged_user->id != "3") style="display:none;" @endif>
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
</script>

