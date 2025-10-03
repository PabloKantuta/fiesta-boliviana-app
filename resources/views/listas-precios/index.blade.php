<x-app-layout>
    <x-slot name="header">Listas de Precios</x-slot>
    <x-slot name="title">Precios - Fiesta Bolivia</x-slot>

    <!-- Toolbar -->
    <x-toolbar 
        searchPlaceholder="Buscar lista de precios..." 
        :showCreateButton="true"
        createRoute="{{ route('listas-precios.create') }}"
        createLabel="Nueva Lista"
    />

    @php
        $listas = [
            ['id' => 1, 'nombre' => 'Lista 2025 - La Paz', 'ciudad' => 'La Paz', 'vigencia' => '2025', 'paquetes' => 15, 'estado' => 'activo'],
            ['id' => 2, 'nombre' => 'Lista 2025 - Santa Cruz', 'ciudad' => 'Santa Cruz', 'vigencia' => '2025', 'paquetes' => 15, 'estado' => 'activo'],
            ['id' => 3, 'nombre' => 'Lista 2025 - Cochabamba', 'ciudad' => 'Cochabamba', 'vigencia' => '2025', 'paquetes' => 15, 'estado' => 'activo'],
            ['id' => 4, 'nombre' => 'Lista 2024 - La Paz', 'ciudad' => 'La Paz', 'vigencia' => '2024', 'paquetes' => 12, 'estado' => 'completado'],
        ];
    @endphp

    @if(count($listas) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($listas as $lista)
                <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100 hover:shadow-xl transition-shadow">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $lista['nombre'] }}</h3>
                            <p class="text-sm text-gray-600">{{ $lista['ciudad'] }}</p>
                        </div>
                        <x-status-badge :status="$lista['estado']" />
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Vigencia:</span>
                            <span class="font-medium text-gray-900">{{ $lista['vigencia'] }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Paquetes:</span>
                            <span class="font-medium text-gray-900">{{ $lista['paquetes'] }}</span>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <a 
                            href="{{ route('listas-precios.show', $lista['id']) }}"
                            class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                        >
                            Ver detalle
                        </a>
                        <button 
                            onclick="/* Editar */"
                            class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                            title="Editar"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <x-empty-state 
            message="No hay listas de precios" 
            :action="route('listas-precios.create')"
            actionLabel="Crear primera lista"
        />
    @endif
</x-app-layout>
