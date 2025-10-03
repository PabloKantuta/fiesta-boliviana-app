<x-app-layout>
    <x-slot name="header">Inventario de Activos</x-slot>
    <x-slot name="title">Activos - Fiesta Bolivia</x-slot>

    <!-- Toolbar -->
    <x-toolbar 
        searchPlaceholder="Buscar por código, nombre o categoría..." 
        :showStatusFilter="true"
        :statusOptions="[
            'disponible' => 'Disponible',
            'en_uso' => 'En Uso',
            'mantenimiento' => 'Mantenimiento',
            'baja' => 'Baja'
        ]"
        :showCreateButton="true"
        createRoute="{{ route('activos.create') }}"
        createLabel="Registrar Activo"
    />

    @php
        $activos = [
            ['codigo' => 'SILLA-001', 'nombre' => 'Silla Tiffany Blanca', 'categoria' => 'Mobiliario', 'estado' => 'disponible', 'ubicacion' => 'Almacén A', 'ultimo_uso' => '28/01/2025'],
            ['codigo' => 'MESA-015', 'nombre' => 'Mesa Redonda 10 personas', 'categoria' => 'Mobiliario', 'estado' => 'en_uso', 'ubicacion' => 'En evento', 'ultimo_uso' => '02/02/2025'],
            ['codigo' => 'MANT-023', 'nombre' => 'Mantel Blanco Premium', 'categoria' => 'Textil', 'estado' => 'disponible', 'ubicacion' => 'Almacén B', 'ultimo_uso' => '25/01/2025'],
            ['codigo' => 'COPA-045', 'nombre' => 'Copa de Cristal', 'categoria' => 'Vajilla', 'estado' => 'disponible', 'ubicacion' => 'Almacén C', 'ultimo_uso' => '20/01/2025'],
            ['codigo' => 'ARCO-001', 'nombre' => 'Arco Decorativo Floral', 'categoria' => 'Decoración', 'estado' => 'mantenimiento', 'ubicacion' => 'Taller', 'ultimo_uso' => '15/01/2025'],
            ['codigo' => 'SILLA-089', 'nombre' => 'Silla Tiffany Dorada', 'categoria' => 'Mobiliario', 'estado' => 'disponible', 'ubicacion' => 'Almacén A', 'ultimo_uso' => '30/01/2025'],
        ];
    @endphp

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase">Total Activos</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">342</p>
                </div>
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase">Disponibles</p>
                    <p class="text-2xl font-bold text-accent mt-1">298</p>
                </div>
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase">En Uso</p>
                    <p class="text-2xl font-bold text-warning mt-1">32</p>
                </div>
                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase">Mantenimiento</p>
                    <p class="text-2xl font-bold text-danger mt-1">12</p>
                </div>
                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    @if(count($activos) > 0)
        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-card overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Último Uso</th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($activos as $activo)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-mono font-medium text-gray-900">{{ $activo['codigo'] }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-medium text-gray-900">{{ $activo['nombre'] }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $activo['categoria'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-status-badge :status="$activo['estado']" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-600">{{ $activo['ubicacion'] }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-500">{{ $activo['ultimo_uso'] }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <button 
                                            onclick="/* Ver historial */"
                                            class="text-primary hover:text-primary/80 focus:outline-none focus:ring-2 focus:ring-primary rounded p-1"
                                            title="Ver historial"
                                        >
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </button>
                                        <button 
                                            onclick="/* Editar */"
                                            class="text-gray-600 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary rounded p-1"
                                            title="Editar"
                                        >
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <x-empty-state 
            message="No hay activos registrados" 
            :action="route('activos.create')"
            actionLabel="Registrar primer activo"
        />
    @endif
</x-app-layout>
