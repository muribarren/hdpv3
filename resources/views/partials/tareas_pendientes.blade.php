<?php
$areas = [
    1 => 'I+D',
    2 => 'Producción',
    3 => 'Compras',
    4 => 'Costes',
    5 => 'Ventas',
    6 => 'I+D',
    7 => 'Calidad',
];
?>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if ($tareas_pendientes->isEmpty())
    <div class="overflow-x-auto">
        <p>No hay tareas pendientes.</p>
    </div>
@else
    <h2 class="text-2xl font-semibold mb-4">Tareas Pendientes</h2>
    <div class="overflow-x-auto">
        <table class="table-auto min-w-full border border-gray-300 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left w-8">Número</th>
                    <th class="px-4 py-2 text-left w-8">Revisión</th>
                    <th class="px-4 py-2 text-left w-64 ">Título</th>
                    <th class="px-4 py-2 text-left w-32">Area</th>
                    <th class="px-4 py-2 text-left w-16">Enlace</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($tareas_pendientes as $tarea)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $tarea->numero }}</td>
                        <td class="px-4 py-2">{{ $tarea->revision }}</td>
                        <td class="px-4 py-2 font-semibold text-gray-800">{{ $tarea->titulo }}</td>
                        <td class="px-4 py-2">{{ $areas[$tarea->secuencia] }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('hdp', ['num' => $tarea->numero, 'rev'=>$tarea->revision]) }}"
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

