<x-app-layout>
    <x-slot name="header">Logística y Órdenes</x-slot>
    <x-slot name="title">Logística - Fiesta Bolivia</x-slot>

    <!-- Toolbar -->
    <x-toolbar 
        searchPlaceholder="Buscar órdenes..." 
        :showStatusFilter="true"
        :statusOptions="[
            'pendiente' => 'Pendiente',
            'en_proceso' => 'En Proceso',
            'entregado' => 'Entregado',
            'retornado' => 'Retornado'
        ]"
        :showDateFilter="true"
    />

    @php
        $ordenes = [
            ['id' => 'ORD-2025-045', 'tipo' => 'Entrega', 'alquiler' => 'ALQ-2025-089', 'cliente' => 'María González', 'fecha' => '14/02/2025', 'hora' => '14:00', 'direccion' => 'Av. Principal 123', 'status' => 'pendiente'],
            ['id' => 'ORD-2025-044', 'tipo' => 'Retiro', 'alquiler' => 'ALQ-2025-087', 'cliente' => 'Ana Rodríguez', 'fecha' => '10/02/2025', 'hora' => '20:00', 'direccion' => 'Calle Secundaria 456', 'status' => 'retornado'],
            ['id' => 'ORD-2025-043', 'tipo' => 'Entrega', 'alquiler' => 'ALQ-2025-088', 'cliente' => 'Carlos Pérez', 'fecha' => '12/02/2025', 'hora' => '10:00', 'direccion' => 'Zona Norte 789', 'status' => 'en_proceso'],
            ['id' => 'ORD-2025-042', 'tipo' => 'Retiro', 'alquiler' => 'ALQ-2025-086', 'cliente' => 'Luis Morales', 'fecha' => '09/02/2025', 'hora' => '08:00', 'direccion' => 'Av. Libertador 321', 'status' => 'retornado'],
        ];
    @endphp

    <!-- Calendar View Toggle -->
    <div class="mb-6 flex items-center justify-between">
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg">
                Lista
            </button>
            <button class="px-4 py-2 bg-white text-gray-700 text-sm font-medium rounded-lg border border-gray-300 hover:bg-gray-50">
                Calendario
            </button>
        </div>

        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2 text-sm">
                <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                <span class="text-gray-600">Entregas</span>
            </div>
            <div class="flex items-center gap-2 text-sm">
                <span class="w-3 h-3 rounded-full bg-green-500"></span>
                <span class="text-gray-600">Retiros</span>
            </div>
        </div>
    </div>

    @if(count($ordenes) > 0)
        <div class="bg-white rounded-2xl shadow-card overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orden</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alquiler</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha/Hora</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dirección</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($ordenes as $orden)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-medium text-gray-900">{{ $orden['id'] }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $orden['tipo'] === 'Entrega' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $orden['tipo'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="#" class="text-sm text-primary hover:underline">{{ $orden['alquiler'] }}</a>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-900">{{ $orden['cliente'] }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $orden['fecha'] }}</p>
                                        <p class="text-xs text-gray-500">{{ $orden['hora'] }} hrs</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600">{{ $orden['direccion'] }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-status-badge :status="$orden['status']" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a 
                                        href="{{ route('ordenes.show', 1) }}" 
                                        class="text-primary hover:text-primary/80 focus:outline-none focus:ring-2 focus:ring-primary rounded p-1"
                                        title="Ver detalle"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <x-empty-state message="No hay órdenes programadas" />
    @endif
</x-app-layout>
