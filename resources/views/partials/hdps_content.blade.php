@php
$areas = [
    1 => 'I+D',
    2 => 'Producción',
    3 => 'Compras',
    4 => 'Costes',
    5 => 'Ventas',
    6 => 'I+D',
    7 => 'Calidad',
];
@endphp

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($hdps->isEmpty())
    <p>No hay HDP's aún.</p>
@else
    <h2 class="text-2xl font-semibold mb-4">Listado de HDP</h2>
    <div class="overflow-x-auto border-gray-300 border rounded-lg">
        <table class="table-auto min-w-full border border-gray-300 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left w-8">Número</th>
                    <th class="px-4 py-2 text-left w-8">Revisión</th>
                    <th class="px-4 py-2 text-left w-64 ">Título</th>
                    <th class="px-4 py-2 text-left w-64">Cliente</th>
                    <th class="px-4 py-2 text-left w-32">Fecha inicio</th>
                    <th class="px-4 py-2 text-left w-48">Estado</th>
                    <th class="px-4 py-2 text-left w-16">Enlace</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($hdps as $hdp)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $hdp->numero }}</td>
                        <td class="px-4 py-2">{{ $hdp->revision }}</td>
                        <td class="px-4 py-2 font-semibold text-gray-800">{{ $hdp->titulo }}</td>
                        <td class="px-4 py-2">{{ $hdp->nombre_cliente }}</td>
                        <td class="px-4 py-2">{{ $hdp->created_at->format('Y-m-d') }}</td>
                        
                        @if ($hdp->rechazado == true)
                            <td class="px-4 py-2 text-red-600 font-bold">RECHAZADO</td>
                        @elseif ($hdp->aprobado == true)
                            <td class="px-4 py-2 text-green-600 font-bold">APROBADO</td>
                        @else
                            <td class="px-4 py-2">{{ $areas[$hdp->secuencia] }}</td>
                        @endif

                        


                        <td class="px-4 py-2">
                            <a href="{{ route('hdp', ['num' => $hdp->numero, 'rev'=>$hdp->revision]) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded-lg shadow">
                                Abrir
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endif
