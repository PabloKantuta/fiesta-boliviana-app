<x-app-layout>
    <x-slot name="header">Detalle de Paquete</x-slot>
    <x-slot name="title">Paquete Boda Premium - Fiesta Bolivia</x-slot>

    @php
        $paquete = [
            'id' => 1,
            'nombre' => 'Paquete Boda Premium',
            'descripcion' => 'Paquete completo y elegante diseñado especialmente para bodas de ensueño. Incluye mobiliario de alta calidad, decoración sofisticada y todos los elementos necesarios para crear una celebración memorable con capacidad para 200 personas.',
            'categoria' => 'Bodas',
            'imagen' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=800&h=400&fit=crop',
            'precios' => [
                ['ciudad' => 'La Paz', 'precio' => 'Bs. 8,500.00', 'vigencia' => '2025'],
                ['ciudad' => 'Santa Cruz', 'precio' => 'Bs. 9,200.00', 'vigencia' => '2025'],
                ['ciudad' => 'Cochabamba', 'precio' => 'Bs. 8,800.00', 'vigencia' => '2025'],
            ],
            'items' => [
                ['nombre' => 'Silla Tiffany Blanca', 'cantidad' => 200, 'categoria' => 'Mobiliario'],
                ['nombre' => 'Mesa Redonda 10 personas', 'cantidad' => 20, 'categoria' => 'Mobiliario'],
                ['nombre' => 'Mantel Blanco Premium', 'cantidad' => 20, 'categoria' => 'Textil'],
                ['nombre' => 'Centro de Mesa Floral', 'cantidad' => 20, 'categoria' => 'Decoración'],
                ['nombre' => 'Copa de Cristal', 'cantidad' => 400, 'categoria' => 'Vajilla'],
                ['nombre' => 'Plato Principal Porcelana', 'cantidad' => 200, 'categoria' => 'Vajilla'],
                ['nombre' => 'Cubiertos Set Completo', 'cantidad' => 200, 'categoria' => 'Vajilla'],
                ['nombre' => 'Arco Decorativo Floral', 'cantidad' => 1, 'categoria' => 'Decoración'],
            ],
        ];
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
        <div class="relative h-64 bg-gray-200">
            <img 
                src="{{ $paquete['imagen'] }}" 
                alt="{{ $paquete['nombre'] }}"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm text-sm font-medium rounded-full mb-3">
                    {{ $paquete['categoria'] }}
                </span>
                <h1 class="text-3xl font-bold">{{ $paquete['nombre'] }}</h1>
            </div>
        </div>

        <div class="p-6">
            <p class="text-gray-700 leading-relaxed">{{ $paquete['descripcion'] }}</p>

            <div class="mt-6 flex flex-wrap gap-4">
                <button 
                    onclick="/* Crear alquiler */"
                    class="inline-flex items-center px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Crear Alquiler
                </button>

                <button 
                    onclick="/* Editar paquete */"
                    class="inline-flex items-center px-6 py-3 bg-white text-gray-700 font-medium rounded-lg border border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Editar Paquete
                </button>
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
                            @foreach($paquete['items'] as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-4 text-sm font-medium text-gray-900">{{ $item['nombre'] }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-600">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $item['categoria'] }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-900 text-right font-medium">{{ $item['cantidad'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-200">
                    <p class="text-sm text-gray-600">
                        <strong>Total de items:</strong> {{ count($paquete['items']) }} tipos diferentes
                    </p>
                </div>
            </div>
        </div>

        <!-- Pricing & Stats -->
        <div class="space-y-6">
            <!-- Pricing -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Precios por Ciudad</h2>
                <div class="space-y-4">
                    @foreach($paquete['precios'] as $precio)
                        <div class="flex items-center justify-between pb-4 border-b border-gray-100 last:border-0">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $precio['ciudad'] }}</p>
                                <p class="text-xs text-gray-500">Vigencia {{ $precio['vigencia'] }}</p>
                            </div>
                            <p class="text-lg font-bold text-primary">{{ $precio['precio'] }}</p>
                        </div>
                    @endforeach
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
