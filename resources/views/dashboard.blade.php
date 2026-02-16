<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Hoja de datos de producto v3') }}
    </h2>

    <div class="flex gap-2">
        <x-nav-link 
            :href="route('nuevo', ['numero' => -1, 'revision' => 0])" 
            :active="request()->routeIs('nuevo')" 
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-200"
        >
            {{ __('CREAR NUEVO HDP') }}
        </x-nav-link>

        <x-nav-link 
            href="/vue_hdpv2" 
            target="_blank" 
            rel="noopener noreferrer"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-200"
        >
            {{ __('VER HDP V2') }}
        </x-nav-link>

    </div>
</div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.tareas_pendientes', ['tareas_pendientes' => $tareas_pendientes])
                </div>
            </div>
        </div>
    </div>
    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.hdps_content')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
