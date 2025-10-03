<x-app-layout>
    <x-slot name="header">Detalle de Paquete</x-slot>
    <x-slot name="title">{{ $paquete->nombre }} - Sr Fiesta</x-slot>

    @php
        // Asignar imagen por defecto según el nombre
        $imagenes = [
            'Paquete Boda' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=800&h=400&fit=crop',
            'Paquete Cumpleaños' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=800&h=400&fit=crop',
            'Paquete Evento' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800&h=400&fit=crop',
        ];
        
        $imagenUrl = 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=800&h=400&fit=crop';
        foreach ($imagenes as $key => $url) {
            if (str_contains($paquete->nombre, $key)) {
                $imagenUrl = $url;
                break;
            }
        }
        
        // Obtener precio del paquete
        $precio = $paquete->precios()->where('tipo', 'alquiler_bidiario')->first();
    @endphp

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('paquetes.index') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900 font-medium">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Volver al catálogo
        </a>
    </div>

    <!-- Package Header -->
    <div class="bg-white rounded-2xl shadow-card overflow-hidden border border-gray-100 mb-6">
        <div class="relative h-64 bg-gradient-to-br from-primary/20 to-accent/20">
            <img 
                src="{{ $imagenUrl }}" 
                alt="{{ $paquete->nombre }}"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                @if($paquete->categoria)
                <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm text-sm font-medium rounded-full mb-3">
                    {{ $paquete->categoria }}
                </span>
                @endif
                <h1 class="text-3xl font-bold">{{ $paquete->nombre }}</h1>
            </div>
        </div>

        <div class="p-6">
            @if($paquete->descripcion)
                <p class="text-gray-700 leading-relaxed">{{ $paquete->descripcion }}</p>
            @else
                <p class="text-gray-500 italic">Sin descripción disponible</p>
            @endif

            <div class="mt-6 flex flex-wrap gap-4">
                <a 
                    href="{{ route('alquileres.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Crear Alquiler con este Paquete
                </a>
            </div>
        </div>
    </div>

    <!-- Details Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Items List -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Items Incluidos</h2>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($paquete->items as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-4 text-sm font-medium text-gray-900">{{ $item->nombre }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-600">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $item->categoria ?? 'Sin categoría' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-900 text-right font-medium">{{ $item->pivot->cantidad_por_paquete }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-200">
                    <p class="text-sm text-gray-600">
                        <strong>Total de items:</strong> {{ $paquete->items->count() }} tipos diferentes
                    </p>
                </div>
            </div>
        </div>

        <!-- Pricing & Stats -->
        <div class="space-y-6">
            <!-- Pricing -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Precio de Alquiler</h2>
                <div class="space-y-4">
                    @if($precio)
                        <div class="text-center py-6">
                            <p class="text-sm text-gray-600 mb-2">Precio Bi-diario</p>
                            <p class="text-4xl font-bold text-primary">Bs. {{ number_format($precio->monto, 2) }}</p>
                            @if($precio->temporada)
                                <p class="text-xs text-gray-500 mt-2">Temporada: {{ $precio->temporada }}</p>
                            @endif
                        </div>
                    @else
                        <p class="text-sm text-gray-500 text-center py-6">Precio no disponible</p>
                    @endif
                </div>
            </div>

            <!-- Stats -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Estadísticas</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Alquileres totales</span>
                        <span class="text-lg font-semibold text-gray-900">45</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Ingresos generados</span>
                        <span class="text-lg font-semibold text-gray-900">Bs. 382,500</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Último alquiler</span>
                        <span class="text-sm text-gray-900">Hace 3 días</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Estado</span>
                        <x-status-badge status="activo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
