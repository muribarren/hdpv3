{{-- resources/views/partials/formulario_content.blade.php --}}
<h1 class="text-4xl font-extrabold text-gray-900 text-center tracking-tight leading-tight sm:text-5xl md:text-6xl lg:text-7xl">
    <span class="block xl:inline">Nuevo HDP</span>
</h1>


@php 
    $highestHdpId = 0; 

    if ($numero == -1) {
        $highestHdpId = $hdps->max('numero');
        $highestHdpId ++;
    }
    else    
        $highestHdpId = $numero;

    $revision = $revision ?? 0;
    

@endphp
<h2 class="text-4xl font-extrabold text-gray-900 text-center tracking-tight leading-tight sm:text-5xl md:text-6xl lg:text-7xl">
    <span class="block xl:inline">Numero: @php echo $highestHdpId @endphp </span>
    <span class="block xl:inline">Revisión:  @php echo $revision @endphp </span>
</h2>


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



<form method="POST" action="{{ route('procesar.nuevo') }}" enctype="multipart/form-data">
    <div class="flex flex-wrap -mx-3 mb-6">
        
        @csrf {{-- Protección CSRF para seguridad --}}
        
        {{-- Campos del formulario --}}
        {{-- Aquí puedes añadir los campos que necesites, por ejemplo: --}} 

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="number" id="numero_display" name="numero_display" value="{{ $highestHdpId}}"  class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" readonly placeholder=" "/>
            <label for="numero_display" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Número</label>
            @error('numero_display')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="number" id="revision_display" name="revision_display" value="{{ $revision}}"  class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" readonly placeholder=" "/>
            <label for="revision_display" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Revisión</label>
            @error('revision_display')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <input type="hidden" name="numero" value="{{ $highestHdpId }}"/> 
        <input type="hidden" name="revision" value="{{ $revision }}"/>
        
        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
            <label for="titulo" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Título</label>
            @error('titulo')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>

        <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
            <input type="text" id="nombre_cliente" name="nombre_cliente" value="{{ old('nombre_cliente') }}" required class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
            <label for="nombre_cliente" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cliente</label>
            @error('nombre_cliente')
                <div class="error-message">{{ $message }}</div>
            @enderror       
        </div>


        <div class="w-full border border-black rounded-lg p-6 mt-6">
            <h3 class="text-lg font-semibold mb-6">Participantes</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- CustoTeam -->
                <div class="form-group">
                    <label for="custoteam_proyecto" class="block mb-1">CustoTeam:</label>
                    <select id="custoteam_proyecto" name="custoteam_proyecto" 
                        class="w-full border-gray-300 rounded" required>
                        <option value="">-- Selecciona CustoTeam --</option>
                        <option value="cajones" {{ old('custoteam_proyecto', $hdp->custoteam_proyecto ?? '') == 'cajones' ? 'selected' : '' }}>Cajones</option>
                        <option value="comfortswin" {{ old('custoteam_proyecto', $hdp->custoteam_proyecto ?? '') == 'comfortswin' ? 'selected' : '' }}>Comfort Swin</option>
                        <option value="correderas" {{ old('custoteam_proyecto', $hdp->custoteam_proyecto ?? '') == 'correderas' ? 'selected' : '' }}>Correderas</option>
                        <option value="ecolift" {{ old('custoteam_proyecto', $hdp->custoteam_proyecto ?? '') == 'ecolift' ? 'selected' : '' }}>Eco Lift</option>
                        <option value="legadrive" {{ old('custoteam_proyecto', $hdp->custoteam_proyecto ?? '') == 'legadrive' ? 'selected' : '' }}>Legadrive</option>
                        <option value="perfiles" {{ old('custoteam_proyecto', $hdp->custoteam_proyecto ?? '') == 'perfiles' ? 'selected' : '' }}>Perfiles Alu</option>
                        <option value="tapas" {{ old('custoteam_proyecto', $hdp->custoteam_proyecto ?? '') == 'tapas' ? 'selected' : '' }}>Tapas</option>
                        <option value="proyecto" {{ old('custoteam_proyecto', $hdp->custoteam_proyecto ?? '') == 'proyecto' ? 'selected' : '' }}>Proyecto</option>
                    </select>
                    @error('custoteam_proyecto')
                        <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Responsable -->
                <div class="form-group">
                    <label for="responsable" class="block mb-1">Responsable de la HDP:</label>
                    <select id="responsable" name="responsable" class="w-full border-gray-300 rounded" required>
                        <option value="">-- Selecciona un responsable --</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('responsable', $hdp->responsable ?? '') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('responsable')
                        <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Sustituto del responsable -->
                <div class="form-group">
                    <label for="sustituto_responsable" class="block mb-1">Sustituto del responsable:</label>
                    <select id="sustituto_responsable" name="sustituto_responsable" class="w-full border-gray-300 rounded">
                        <option value="">-- Selecciona un sustituto de responsable --</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('sustituto_responsable', $hdp->sustituto_responsable ?? '') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('sustituto_responsable')
                        <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Participante I+D -->
                <div class="form-group">
                    <label for="imasd" class="block mb-1">Participante I+D:</label>
                    <select id="imasd" name="imasd" class="w-full border-gray-300 rounded" required>
                        <option value="">-- Selecciona participante I+D --</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('imasd', $participante->imasd ?? '') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('imasd')
                        <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Participante Costos -->
                <div class="form-group">
                    <label for="costos" class="block mb-1">Participante Costos:</label>
                    <select id="costos" name="costos" class="w-full border-gray-300 rounded" required>
                        <option value="">-- Selecciona participante Costos --</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('costos', $participante->costos ?? '') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('costos')
                        <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Participante Producción -->
                <div class="form-group">
                    <label for="produccion" class="block mb-1">Participante Producción:</label>
                    <select id="produccion" name="produccion" class="w-full border-gray-300 rounded" required>
                        <option value="">-- Selecciona participante Producción --</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('produccion', $participante->produccion ?? '') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('produccion')
                        <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Participante Compras -->
                <div class="form-group">
                    <label for="compras" class="block mb-1">Participante Compras:</label>
                    <select id="compras" name="compras" class="w-full border-gray-300 rounded" required>
                        <option value="">-- Selecciona participante Compras --</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('compras', $participante->compras ?? '') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('compras')
                        <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ventas" class="block mb-1">Participante comercial:</label>
                    <select id="ventas" name="ventas" class="w-full border-gray-300 rounded" required>
                        <option value="">-- Selecciona participante ventas --</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('ventas', $participante->ventas ?? '') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('ventas')
                        <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Participante Calidad -->
                <div class="form-group">
                    <label for="calidad" class="block mb-1">Participante calidad:</label>
                    <select id="calidad" name="calidad" class="w-full border-gray-300 rounded" required>
                        <option value="">-- Selecciona participante calidad --</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('calidad', $participante->calidad ?? '') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('calidad')
                        <div class="error-message text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="w-full border border-black rounded-lg p-6 mt-6">
            <h3 class="text-lg font-semibold mb-6">Datos</h3>
        
            <div class="form-group w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
                <label>
                    <input type="hidden" name="core_product" value="0">
                    <input type="checkbox" name="core_product" value="1" {{ old('core_product') ? 'checked' : '' }}>
                    Producto core
                </label>
                @error('core_product')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group relative w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
                <label>
                    <input type="hidden" name="sustituye" value="0">
                    <input type="checkbox" name="sustituye" value="1" id = "sustituye"{{ old('sustituye') ? 'checked' : '' }}>
                    Sustituye producto:
                </label>

                @error('sustituye')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div id="sustitucionGroup" class="form-group relative w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4" style="display: none;" > {{-- Oculto por defecto --}}

                <input type="text" id="sustitucion" name="sustitucion" value="{{ old('sustitucion') }}"  class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                <label for="sustitucion" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Sustitución</label>

                @error('sustitucion')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            


            <div class="form-group relative w-full px-3 mt-6 mt-4">

                <textarea type="text" id="descripcion" name="descripcion" required rows="5" cols="50" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>{{ old('descripcion') }}</textarea>
                <label for="descripcion" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Descripción</label>
                @error('descripcion')
                    <div class="error-message">{{ $message }}</div>
                @enderror       
            </div>


            <div class="flex flex-wrap -mx-3">
    <div class="form-group relative w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
        <input type="text" id="consumo" name="consumo" value="{{ old('consumo') }}" required
            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" "/>
        <label for="consumo"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Consumo</label>
        @error('consumo')
            <div class="error-message">{{ $message }}</div>
        @enderror       
    </div>

    <div class="form-group relative w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
        <select id="consumo_unidad" name="consumo_unidad" required
            class="block w-full border border-gray-300 rounded-lg px-2.5 py-2">
            <option value="">-- Selecciona una Unidad --</option>
            <option value="piezas" {{ old('consumo_unidad') == 'piezas' ? 'selected' : '' }}>Piezas</option>
            <option value="juegos" {{ old('consumo_unidad') == 'juegos' ? 'selected' : '' }}>Juegos</option>
        </select>
        @error('consumo_unidad')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group relative w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
        <select id="consumo_tipo" name="consumo_tipo" required
            class="block w-full border border-gray-300 rounded-lg px-2.5 py-2">
            <option value="">-- Selecciona un tipo --</option>
            <option value="alano" {{ old('consumo_tipo') == 'alano' ? 'selected' : '' }}>Al año</option>
            <option value="pedidounico" {{ old('consumo_tipo') == 'pedidounico' ? 'selected' : '' }}>Pedido único</option>
        </select>
        @error('consumo_tipo')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group relative w-full md:w-1/4 px-3 mb-6 md:mb-0 mt-4">
        <input type="text" id="precio_deseado" name="precio_deseado" value="{{ old('precio_deseado') }}"
            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" "/>
        <label for="precio_deseado"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Precio deseado ("€/100")</label>
        @error('precio_deseado')
            <div class="error-message">{{ $message }}</div>
        @enderror       
    </div>
</div>


            <div class="flex flex-wrap -mx-3">
                <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
                    <label for="fecha_deseada">Fecha deseada para la oferta:</label>
                    <input type="date" id="fecha_deseada" name="fecha_deseada" value="{{ old('fecha_deseada') }}" required>
                    @error('fecha_deseada')
                        <div class="error-message">{{ $message }}</div>
                    @enderror       
                </div>

                <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
                    <label for="fecha_decision">Fecha de decisión:</label>
                    <input type="date" id="fecha_decision" name="fecha_decision" value="{{ old('fecha_decision') }}">
                    @error('fecha_decision')
                        <div class="error-message">{{ $message }}</div>
                    @enderror       
                </div>

                <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
                    <label for="fecha_comienzo">Comienzo de proyecto:</label>
                    <input type="date" id="fecha_comienzo" name="fecha_comienzo" value="{{ old('fecha_comienzo') }}">
                    @error('fecha_comienzo')
                        <div class="error-message">{{ $message }}</div>
                    @enderror       
                </div>

                <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
                    <label for="fecha_envio">Comienzo de envío:</label>
                    <input type="date" id="fecha_envio" name="fecha_envio" value="{{ old('fecha_envio') }}">
                    @error('fecha_envio')
                        <div class="error-message">{{ $message }}</div>
                    @enderror       
                </div>
            </div>

            <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
                <input type="text" id="requisitos" name="requisitos" value="{{  old('requisitos')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="requisitos" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Requisitos legales y reglamentarios</label>
                @error('requisitos')
                    <div class="error-message">{{ $message }}</div>
                @enderror       
            </div>

            <div class="form-group relative w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-4">
                <input type="text" id="reciclaje" name="reciclaje" value="{{  old('reciclaje')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="reciclaje" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Aspectos de reciclaje e impacto ambiental y requerimientos/normativas sobre seguridad</label>
                @error('reciclaje')
                    <div class="error-message">{{ $message }}</div>
                @enderror       
            </div>

            <div class="form-group relative w-full px-3 mt-6 mt-4">
                <textarea type="text" id="notas" name="notas" rows="5" cols="50" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>{{ old('notas') }}</textarea>
                <label for="notas" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Notas</label>
                @error('notas')
                    <div class="error-message">{{ $message }}</div>
                @enderror       
            </div>



            <div id="anexos-container" class="w-full px-3 mt-6">
                <div class="form-group anexo-item">
                    <label>Anexo 1:</label>
                    <input type="file" id="anexos" name="anexos[]" class="anexo-input"> {{-- ¡Añadimos la clase 'anexo-input'! --}}
                    {{-- Los errores para cada input individual se manejarán en el controlador al enviar --}}
                </div>
            </div>
        </div>

       

        <button type="submit" class="w-full px-3 mt-6 text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">GUARDAR</button>
    </div>
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

        // Añadir el event listener al campo inicial al cargar la página
        const initialInput = anexosContainer.querySelector('.anexo-input');
        addChangeListenerToInput(initialInput);

        const checkbox = document.getElementById('sustituye');
        const grupoSustitucion = document.getElementById('sustitucionGroup');
        const inputSustitucion = document.getElementById('sustitucion');

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


document.getElementById("custoteam_proyecto").addEventListener("change", function () {
    const valor = this.value;

    // ejemplo de reglas
    if (valor === "cajones") {
        document.getElementById("responsable").value = 1;
        document.getElementById("imasd").value = 2;
        document.getElementById("costos").value = 3;
        document.getElementById("produccion").value = 1;
        document.getElementById("compras").value = 2;
        document.getElementById("ventas").value = 3;
        document.getElementById("calidad").value = 1;
    } else if (valor === "comfortswin") {
        document.getElementById("responsable").value = "earriaga";
        document.getElementById("imasd").value = "amartinez";
        document.getElementById("costos").value = "iangulo";    
        document.getElementById("produccion").value = "mazkue";
        document.getElementById("compras").value = "afabra";
        document.getElementById("ventas").value = "earraiga";
        document.getElementById("calidad").value = "rlorenzo";
    } else if (valor === "correderas") {
        document.getElementById("responsable").value = "amitxelena";
        document.getElementById("imasd").value = "majuria";
        document.getElementById("costos").value = "iangulo";    
        document.getElementById("produccion").value = "jacuesta";
        document.getElementById("compras").value = "earistegui";
        document.getElementById("ventas").value = "amitxelena";
        document.getElementById("calidad").value = "junanue";
    } else if (valor === "ecolift") {
        document.getElementById("responsable").value = "jdiaz";
        document.getElementById("imasd").value = "ilopetegi";
        document.getElementById("costos").value = "iangulo";    
        document.getElementById("produccion").value = "jacuesta";
        document.getElementById("compras").value = "earistegui";
        document.getElementById("ventas").value = "jdiaz";
        document.getElementById("calidad").value = "malbeniz";
    } else if (valor === "legadrive") {
        document.getElementById("responsable").value = "majuria";
        document.getElementById("imasd").value = "majuria";
        document.getElementById("costos").value = "iangulo";    
        document.getElementById("produccion").value = "ftena";
        document.getElementById("compras").value = "earistegui";
        document.getElementById("ventas").value = "amitxelena";
        document.getElementById("calidad").value = "ftena";
    } else if (valor === "perfiles") {
        document.getElementById("responsable").value = "jacuesta";
        document.getElementById("imasd").value = "jacuesta";
        document.getElementById("costos").value = "iangulo";    
        document.getElementById("produccion").value = "jacuesta";
        document.getElementById("compras").value = "earistegui";
        document.getElementById("ventas").value = "marbeloa";
        document.getElementById("calidad").value = "junanue";
    } else if (valor === "tapas") {
        document.getElementById("responsable").value = "majuria";
        document.getElementById("imasd").value = "majuria";
        document.getElementById("costos").value = "majuria";    
        document.getElementById("produccion").value = "majuria";
        document.getElementById("compras").value = "majuria";
        document.getElementById("ventas").value = "majuria";
        document.getElementById("calidad").value = "majuria";
    } else if (valor === "proyecto") {
        document.getElementById("responsable").value = "earriaga";
        document.getElementById("imasd").value = "";
        document.getElementById("costos").value = "";    
        document.getElementById("produccion").value = "";
        document.getElementById("compras").value = "";
        document.getElementById("ventas").value = "";
        document.getElementById("calidad").value = "";
    }       
});
</script>

