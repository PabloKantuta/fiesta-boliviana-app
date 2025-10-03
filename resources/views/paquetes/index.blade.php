<x-app-layout>
    <x-slot name="header">Catálogo de Paquetes</x-slot>
    <x-slot name="title">Paquetes - Fiesta Bolivia</x-slot>

    <!-- Toolbar -->
    <x-toolbar 
        searchPlaceholder="Buscar paquetes por nombre..." 
        :showCreateButton="true"
        createRoute="{{ route('paquetes.create') }}"
        createLabel="Nuevo Paquete"
    />

    <!-- Packages Grid -->
    @php
        $paquetes = [
            [
                'id' => 1,
                'nombre' => 'Paquete Boda Premium',
                'descripcion' => 'Paquete completo para bodas elegantes con capacidad para 200 personas',
                'precio_desde' => 'Bs. 8,500.00',
                'items_count' => 45,
                'imagen' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=400&h=300&fit=crop',
                'categoria' => 'Bodas'
            ],
            [
                'id' => 2,
                'nombre' => 'Paquete Cumpleaños Infantil',
                'descripcion' => 'Todo lo necesario para una fiesta infantil inolvidable hasta 50 niños',
                'precio_desde' => 'Bs. 2,800.00',
                'items_count' => 28,
                'imagen' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=400&h=300&fit=crop',
                'categoria' => 'Infantiles'
            ],
            [
                'id' => 3,
                'nombre' => 'Paquete Evento Corporativo',
                'descripcion' => 'Mobiliario y equipamiento profesional para eventos empresariales',
                'precio_desde' => 'Bs. 5,500.00',
                'items_count' => 35,
                'imagen' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=400&h=300&fit=crop',
                'categoria' => 'Corporativos'
            ],
            [
                'id' => 4,
                'nombre' => 'Paquete Fiesta Teen',
                'descripcion' => 'Ambiente moderno y juvenil para celebraciones adolescentes',
                'precio_desde' => 'Bs. 3,200.00',
                'items_count' => 22,
                'imagen' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=400&h=300&fit=crop',
                'categoria' => 'Adolescentes'
            ],
            [
                'id' => 5,
                'nombre' => 'Paquete Graduación',
                'descripcion' => 'Celebra tu graduación con estilo, capacidad para 150 personas',
                'precio_desde' => 'Bs. 4,800.00',
                'items_count' => 32,
                'imagen' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400&h=300&fit=crop',
                'categoria' => 'Académicos'
            ],
            [
                'id' => 6,
                'nombre' => 'Paquete Bautizo',
                'descripcion' => 'Decoración delicada y elegante para ceremonias religiosas',
                'precio_desde' => 'Bs. 2,200.00',
                'items_count' => 18,
                'imagen' => 'https://images.unsplash.com/photo-1464047736614-af63643285bf?w=400&h=300&fit=crop',
                'categoria' => 'Religiosos'
            ],
        ];
    @endphp

    @if(count($paquetes) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($paquetes as $paquete)
                <div class="bg-white rounded-2xl shadow-card overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow">
                    <!-- Image -->
                    <div class="relative h-48 bg-gray-200 overflow-hidden">
                        <img 
                            src="{{ $paquete['imagen'] }}" 
                            alt="{{ $paquete['nombre'] }}"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-xs font-medium text-gray-700 rounded-full">
                                {{ $paquete['categoria'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $paquete['nombre'] }}</h3>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $paquete['descripcion'] }}</p>

                        <!-- Meta Info -->
                        <div class="flex items-center gap-4 mb-4 pb-4 border-b border-gray-100">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                {{ $paquete['items_count'] }} items
                            </div>
                        </div>

                        <!-- Price & Actions -->
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs text-gray-500">Desde</p>
                                <p class="text-xl font-bold text-gray-900">{{ $paquete['precio_desde'] }}</p>
                            </div>
                            <a 
                                href="{{ route('paquetes.show', $paquete['id']) }}"
                                class="inline-flex items-center px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                            >
                                Ver detalle
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <nav class="flex items-center space-x-2" aria-label="Paginación">
                <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary disabled:opacity-50" disabled>
                    Anterior
                </button>
                <button class="px-3 py-2 text-sm font-medium text-white bg-primary border border-primary rounded-lg">1</button>
                <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary">2</button>
                <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary">3</button>
                <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary">
                    Siguiente
                </button>
            </nav>
        </div>
    @else
        <x-empty-state 
            message="No hay paquetes disponibles" 
            :action="route('paquetes.create')"
            actionLabel="Crear primer paquete"
        />
    @endif
</x-app-layout>
