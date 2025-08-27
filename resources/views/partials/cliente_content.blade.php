<form>
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Datos</h3>
        <div class="form-group relative w-1/2 md:w-1/2 px-3 mb-6 md:mb-0  mt-4" hidden>
            <input type="text" id="numero" name="numero" value="{{ $hdp -> numero}}" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  readonly placeholder=" " />
            <label for="numero" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Número</label>
            @error('numero')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4" hidden>
            <input type="text" id="revision" name="revision" value="{{ $hdp -> revision}}" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" readonly  placeholder=" " />
            <label for="revision" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Revisión</label>
            @error('revision')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="titulo" name="titulo" value="{{ $hdp -> titulo}}" maxlength="250" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" readonly placeholder=" " />
            <label for="titulo" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Título</label>
            @error('titulo')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>   

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="nombre_cliente" name="nombre_cliente" value="{{ $hdp -> nombre_cliente}}"  maxlength="250" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500" readonly placeholder=" " />
            <label for="nombre_cliente" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cliente</label>
            @error('nombre_cliente')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <select id="consumo_unidad" name="consumo_unidad" disabled>
                <option value="">-- Selecciona una Unidad --</option>
                <option value="piezas" {{ $hdp->consumo_unidad == 'piezas' ? 'selected' : '' }}>Piezas</option>
                <option value="juegos" {{ $hdp->consumo_unidad == 'juegos' ? 'selected' : '' }}>Juegos</option>
            </select>

            @error('consumo_unidad')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group relative w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <select id="consumo_tipo" name="consumo_tipo" disabled>
                <option value="">-- Selecciona un tipo --</option>
                <option value="alano" {{ $hdp->consumo_tipo == 'alano' ? 'selected' : '' }}>Al año</option>
                <option value="pedidounico" {{ $hdp->consumo_tipo == 'pedidounico' ? 'selected' : '' }}>Pedido único</option>
            </select>

            @error('consumo_unidad')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <label for="custoteam_proyecto">CustoTeam:</label>
            <select id="custoteam_proyecto" name="custoteam_proyecto" class="w-full border-gray-300 rounded" disabled>
                <option value="">-- Selecciona CustoTeam --</option>
                <option value="cajones" {{ $hdp->custoteam_proyecto  == 'cajones' ? 'selected' : '' }}>Cajones</option>
                <option value="comfortswin" {{ $hdp->custoteam_proyecto == 'comfortswin' ? 'selected' : '' }}>Comfort Swin</option>
                <option value="correderas" {{ $hdp->custoteam_proyecto  == 'correderas' ? 'selected' : '' }}>Correderas</option>
                <option value="ecolift" {{ $hdp->custoteam_proyecto == 'ecolift' ? 'selected' : '' }}>Eco Lift</option>
                <option value="legadrive" {{ $hdp->custoteam_proyecto == 'legadrive' ? 'selected' : '' }}>Legadrive</option>
                <option value="perfiles" {{  $hdp->custoteam_proyecto  == 'perfiles' ? 'selected' : '' }}>Perfiles Alu</option>
                <option value="tapas" {{  $hdp->custoteam_proyecto  == 'tapas' ? 'selected' : '' }}>Tapas</option>
                <option value="proyecto" {{ $hdp->custoteam_proyecto  == 'proyecto' ? 'selected' : '' }}>Proyecto</option>
            </select>
            @error('custoteam_proyecto')
                <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="checkbox" id="core_product" name="core_product"  @if ($hdp->core_product) checked @endif disabled class="mr-2 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
            <label for="core_product" class="text-sm text-gray-700 dark:text-gray-400">
                Core product
            </label>
            @error('core_product')
                <div class="error-message text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="checkbox" id="sustituye" name="sustituye" @if ($hdp->sustituye) checked @endif disabled class="mr-2 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
            <label for="sustituye" class="text-sm text-gray-700 dark:text-gray-400">
                Sustituye
            </label>
            @error('sustituye')
                <div class="error-message text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="sustitucion" name="sustitucion" value="{{ $hdp -> sustitucion}}" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  readonly placeholder=" " />
            <label for="sustitucion" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Sustitución</label>
            @error('sustitucion')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  
        
        
        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <textarea type="text" id="descripcion" name="descripcion" maxlength="500" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  readonly placeholder=" " >{{ $hdp -> descripcion}}</textarea>
            <label for="descripcion" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Descripción</label>
            @error('descripcion')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="consumo" name="consumo" value="{{ $hdp -> consumo}}" maxlength="250" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  readonly placeholder=" " />
            <label for="consumo" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Consumo</label>
            @error('consumo')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

        <div class="form-group relative w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <select id="consumo_unidad" name="consumo_unidad" disabled>
                <option value="">-- Selecciona una Unidad --</option>
                <option value="piezas" {{ $hdp->consumo_unidad == 'piezas' ? 'selected' : '' }}>Piezas</option>
                <option value="juegos" {{ $hdp->consumo_unidad == 'juegos' ? 'selected' : '' }}>Juegos</option>
            </select>

            @error('consumo_unidad')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group relative w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <select id="consumo_tipo" name="consumo_tipo" disabled>
                <option value="">-- Selecciona un tipo --</option>
                <option value="alano" {{ $hdp->consumo_tipo == 'alano' ? 'selected' : '' }}>Al año</option>
                <option value="pedidounico" {{ $hdp->consumo_tipo == 'pedidounico' ? 'selected' : '' }}>Pedido único</option>
            </select>

            @error('consumo_tipo')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="precio_deseado" name="precio_deseado" value="{{ $hdp -> precio_deseado}}" maxlength="250"  required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  readonly placeholder=" " />
            <label for="precio_deseado" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Precio deseado</label>
            @error('precio_deseado')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  


        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <label for="fecha_deseada">Fecha deseada para la oferta:</label>
            <input type="date" id="fecha_deseada" name="fecha_deseada" value="{{ old('fecha_deseada', isset($hdp) ? $hdp->fecha_deseada?->format('Y-m-d') : '') }}" readonly>
            @error('fecha_deseada')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <label for="fecha_decision">Fecha de decisión:</label>
            <input type="date" id="fecha_decision" name="fecha_decision" value="{{ old('fecha_decision', isset($hdp) ? $hdp->fecha_decision?->format('Y-m-d') : '') }}" readonly>
            @error('fecha_decision')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>
        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <label for="fecha_comienzo">Comienzo de proyecto:</label>
            <input type="date" id="fecha_comienzo" name="fecha_comienzo" value="{{ old('fecha_comienzo', isset($hdp) ? $hdp->fecha_comienzo?->format('Y-m-d') : '') }}" readonly>
            @error('fecha_comienzo')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>
        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <label for="fecha_envio">Comienzo de envío:</label>
            <input type="date" id="fecha_envio" name="fecha_envio" value="{{ old('fecha_envio', isset($hdp) ? $hdp->fecha_envio?->format('Y-m-d') : '') }}" readonly>
            @error('fecha_envio')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="requisitos" name="requisitos" value="{{ $hdp -> requisitos}}" maxlength="250"  required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  readonly placeholder=" " />
            <label for="requisitos" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Requisitos legales y reglamentarios</label>
            @error('requisitos')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>  

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="reciclaje" name="reciclaje" value="{{ $hdp -> reciclaje}}" maxlength="250" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  readonly placeholder=" " />
            <label for="reciclaje" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Aspectos de reciclaje e impacto ambiental</label>
            @error('reciclaje')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <textarea type="text" id="notas" name="notas"  maxlength="500" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer bg-gray-100 text-gray-500"  readonly placeholder=" " >{{ $hdp -> notas}}</textarea>
            <label for="notas" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Notas</label>
            @error('notas')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>
    </div>  
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Anexos</h3>
        @if (empty($hdp->anexos))
            <li>No hay anexos disponibles.</li>
        @else
            <ul class="list-disc ml-6 mt-2">
                @foreach (explode(',', $hdp->anexos) as $archivo)
                    <li>
                        <a href="{{ asset('storage/' . $archivo) }}" target="_blank" class="text-blue-600 underline">
                            {{ basename($archivo) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="w-full border border-black rounded-lg p-6 mt-6">
        <h3 class="text-lg font-semibold mb-6">Participantes</h3>
        <div class="form-group w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <label for="responsable">Responsable de la HDP:</label>
            <select id="responsable" name="responsable" class="form-select" required disabled>
                <option value="">-- Selecciona un responsable --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $hdp->responsable  == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
            @error('responsable')
                <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>    

        <div class="form-group w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <label for="sustituto_responsable">Sustituto responsable de la HDP:</label>
            <select id="sustituto_responsable" name="sustituto_responsable" class="form-select" required disabled>
                <option value="">-- Selecciona un sustituto del responsable --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $hdp->sustituto_responsable  == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
            @error('sustituto_responsable')
                <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <label for="imasd">Participante I+D:</label>
            <select id="imasd" name="imasd" class="form-select" required disabled>
                <option value="">-- Selecciona un participante I+D --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $participante->imasd  == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
            @error('imasde')
                <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <label for="produccion">Participante produccion:</label>
            <select id="produccion" name="produccion" class="form-select" required disabled>
                <option value="">-- Selecciona un participante de produccion --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $participante->produccion  == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
            @error('produccion')
                <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <label for="compras">Participante compras:</label>
            <select id="compras" name="compras" class="form-select" required disabled>
                <option value="">-- Selecciona un participante de comrpas --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $participante->compras  == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
            @error('compras')
                <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <label for="costos">Participante Costes:</label>
            <select id="costos" name="costos" class="form-select" required disabled>
                <option value="">-- Selecciona un participante de costes --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $participante->costos  == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
            @error('costos')
                <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

         <div class="form-group w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <label for="ventas">Participante ventas:</label>
            <select id="ventas" name="ventas" class="form-select" required disabled>
                <option value="">-- Selecciona un participante de ventas --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $participante->ventas  == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
            @error('ventas')
                <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
       
        <div class="form-group w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
            <label for="calidad">Participante calidad:</label>
            <select id="calidad" name="calidad" class="form-select" required disabled>
                <option value="">-- Selecciona un participante de calidad --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $participante->calidad  == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
            @error('calidad')
                <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>    
    <button class="bg-green-600 text-white px-4 py-2 rounded mt-4" @if($hdp->rechazado || $hdp->aprobado || $hdp->secuencia > 1) style="display:none;" @endif>Editar</button>

</form>