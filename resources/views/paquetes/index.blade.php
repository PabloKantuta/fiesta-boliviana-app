<x-app-layout>
    <x-slot name="header">Catálogo de Paquetes</x-slot>
    <x-slot name="title">Paquetes - Sr Fiesta</x-slot>

    <!-- Toolbar -->
    <x-toolbar 
        searchPlaceholder="Buscar paquetes por nombre..." 
        :showCreateButton="false"
    />

    <!-- Packages Grid -->
    @if($paquetes && count($paquetes) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($paquetes as $paquete)
                @php
                    // Obtener precio mínimo del paquete
                    $precioMinimo = $paquete->precios()->where('tipo', 'alquiler_bidiario')->first();
                    $precioDesde = $precioMinimo ? number_format($precioMinimo->monto, 2) : '0.00';
                    
                    // Contar items
                    $itemsCount = $paquete->items->count();
                    
                    // Asignar imagen por defecto según el nombre
                    $imagenes = [
                        'Paquete Boda' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=400&h=300&fit=crop',
                        'Paquete Cumpleaños' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=400&h=300&fit=crop',
                        'Paquete Evento' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=400&h=300&fit=crop',
                    ];
                    
                    $imagenUrl = 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=400&h=300&fit=crop';
                    foreach ($imagenes as $key => $url) {
                        if (str_contains($paquete->nombre, $key)) {
                            $imagenUrl = $url;
                            break;
                        }
                    }
                @endphp
                
                <div class="bg-white rounded-2xl shadow-card overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow">
                    <!-- Image -->
                    <div class="relative h-48 bg-gradient-to-br from-primary/20 to-accent/20 overflow-hidden">
                        <img 
                            src="{{ $imagenUrl }}" 
                            alt="{{ $paquete->nombre }}"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                        @if($paquete->categoria)
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-xs font-medium text-gray-700 rounded-full">
                                {{ $paquete->categoria }}
                            </span>
                        </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $paquete->nombre }}</h3>
                        @if($paquete->descripcion)
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $paquete->descripcion }}</p>
                        @else
                            <p class="text-sm text-gray-500 italic mb-4">Sin descripción disponible</p>
                        @endif

                        <!-- Meta Info -->
                        <div class="flex items-center gap-4 mb-4 pb-4 border-b border-gray-100">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                {{ $itemsCount }} {{ $itemsCount == 1 ? 'item' : 'items' }}
                            </div>
                        </div>

                        <!-- Price & Actions -->
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs text-gray-500">Precio Bi-diario</p>
                                <p class="text-xl font-bold text-gray-900">Bs. {{ $precioDesde }}</p>
                            </div>
                            <a 
                                href="{{ route('paquetes.show', $paquete->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                            >
                                Ver detalle
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <x-empty-state 
            message="No hay paquetes disponibles en el catálogo" 
            actionLabel="Volver a Alquileres"
        />
    @endif
</x-app-layout>
