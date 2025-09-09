<form method="POST" action="{{ route('procesar')}}" enctype="multipart/form-data">
    @csrf
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Datos</h3>
        <input type="hidden" name="tipo" value="compras">

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="idhdp" name="idhdp" value="{{ $compras->idhdp ?? '' }}"    {{ $participante->compras != $loged_user->id ? 'readonly' : '' }} required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="idhdp" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">NUmero</label>
            @error('idhdp')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="revision" name="revision" value="{{ $compras->revision ?? '' }}"    {{ $participante->compras != $loged_user->id ? 'readonly' : '' }} required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="revision" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">revision</label>
            @error('revision')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="precio" name="precio" value="{{ $compras->precio ?? '' }}"  maxlength="250"  {{ $participante->compras != $loged_user->id || $loged_user->id == "2" || $loged_user->id == "3"? 'readonly' : '' }} required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="precio" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Precio</label>
            @error('precio')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="inversion_troquel" name="inversion_troquel" maxlength="250" value=" {{ $compras->inversion_troquel ?? '' }}"    {{ $participante->compras != $loged_user->id || $loged_user->id == "2" || $loged_user->id == "3"? 'readonly' : '' }}  class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  placeholder=" " />
            <label for="inversion_troquel" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Inversión troquel</label>
            @error('inversion_troquel')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <textarea type="text" id="notas" name="notas" {{ $participante->compras != $loged_user->id || $loged_user->id == "2" || $loged_user->id == "3" ? 'readonly' : '' }} maxlength="500" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  readonly placeholder=" " >{{ $compras->notas ?? '' }}</textarea>
            <label for="notas" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Notas</label>
            @error('notas')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>
    </div>

    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Anexos</h3>
        @if (empty($compras->anexos))
        <div id="anexos-container" class="w-full px-3 mt-6">
            <div class="form-group anexo-item">
                <label>Anexo 1:</label>
                <input type="file" id="anexos" name="anexos[]" class="anexo-input">
            </div>
        </div>
        @else
            <h4>Lista de anexos:</h4>
            <ul class="list-disc ml-6 mt-2">
                @foreach (explode(',', $compras->anexos) as $archivo)
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

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded" @if($hdp->rechazado || $hdp->secuencia > 4 ||  $participante->compras != $loged_user->id) style="display:none;" @endif>Enviar</button>
    
</form>
<form id="rechazarForm" action="{{ route('rechazar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="numero" value="{{ $hdp->numero }}">
    <input type="hidden" name="revision" value="{{ $hdp->revision }}">
    <input type="hidden" name="rechazado" value="1">
    <!-- Aquí guardaremos el motivo -->
    <input type="hidden" name="motivo_rechazo" id="motivo_rechazo" value="">

    <button type="button" id="btnRechazar" class="bg-red-600 text-white px-4 py-2 rounded"
        @if($hdp->rechazado || $hdp->secuencia > 2 ||  $participante->compras != $loged_user->id || $loged_user->id != "2" || $loged_user->id != "3") style="display:none;" @endif>
        Rechazar
    </button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const anexosContainer = document.getElementById('anexos-container');
    let anexoCount = 1;

    function addNewAnexoInput() {
        anexoCount++;
        const newAnexoDiv = document.createElement('div');
        newAnexoDiv.classList.add('form-group', 'anexo-item');
        newAnexoDiv.innerHTML = `
            <label>Anexo ${anexoCount}:</label>
            <input type="file" id="anexos${anexoCount}" name="anexos[]" class="anexo-input">
        `;
        anexosContainer.appendChild(newAnexoDiv);
        addChangeListenerToInput(newAnexoDiv.querySelector('.anexo-input'));
    }

    function addChangeListenerToInput(inputElement) {
        inputElement.addEventListener('change', function() {
            const lastInput = anexosContainer.lastElementChild.querySelector('.anexo-input');
            if (this.files.length > 0 && this === lastInput) {
                addNewAnexoInput();
            }
        });
    }

    // ✅ Inicializa el primer input existente
    const firstInput = anexosContainer?.querySelector('.anexo-input');
    if (firstInput) {
        addChangeListenerToInput(firstInput);
    }

    document.getElementById('btnRechazar').addEventListener('click', function() {
        const motivo = prompt("Por favor, escribe el motivo del rechazo:");
        if (motivo !== null && motivo.trim() !== "") {
            document.getElementById('motivo_rechazo').value = motivo.trim();
            document.getElementById('rechazarForm').submit();
        } else {
            alert("Debes escribir un motivo para poder rechazar.");
        }
    });
});
</script>



