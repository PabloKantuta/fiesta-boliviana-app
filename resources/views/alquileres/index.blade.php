<x-app-layout>
    <x-slot name="header">Gestión de Alquileres</x-slot>
    <x-slot name="title">Alquileres - Sr Fiesta</x-slot>

    <!-- Toolbar -->
    <x-toolbar 
        searchPlaceholder="Buscar por cliente, código o evento..." 
        :showStatusFilter="true"
        :statusOptions="[
            'pendiente' => 'Pendiente',
            'activo' => 'Activo',
            'completado' => 'Completado',
            'cancelado' => 'Cancelado'
        ]"
        :showDateFilter="true"
        :showCreateButton="true"
        createRoute="{{ route('alquileres.create') }}"
        createLabel="Nuevo Alquiler"
    />

    @if(isset($alquileres) && count($alquileres) > 0)
        <!-- Table Container -->
        <div class="bg-white rounded-2xl shadow-card overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200 sticky top-0">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Contrato</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Entrega</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($alquileres as $alquiler)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-medium text-gray-900">{{ $alquiler->id }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $alquiler->cliente->nombre ?? 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-900">{{ $alquiler->fecha_contrato }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-900">{{ $alquiler->fecha_entrega_prevista }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-semibold text-gray-900">Bs. {{ number_format($alquiler->total, 2) }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-status-badge :status="$alquiler->estado ?? 'pendiente'" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <a 
                                            href="{{ route('alquileres.show', $alquiler) }}" 
                                            class="text-primary hover:text-primary/80 focus:outline-none focus:ring-2 focus:ring-primary rounded p-1"
                                            title="Ver detalle"
                                        >
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>
                                        {{-- <button 
                                            onclick="/* Editar */"
                                            class="text-gray-600 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary rounded p-1"
                                            title="Editar"
                                        > --}}
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
            message="No hay alquileres registrados" 
            :action="route('alquileres.create')"
            actionLabel="Crear primer alquiler"
        />
    @endif
</x-app-layout>
