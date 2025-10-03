<x-app-layout>
    <x-slot name="header">Detalle de Alquiler #{{ $alquiler->id ?? 'ALQ-2025-089' }}</x-slot>
    <x-slot name="title">Alquiler {{ $alquiler->id ?? 'ALQ-2025-089' }} - Fiesta Bolivia</x-slot>

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('alquileres.index') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900 font-medium">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Volver a alquileres
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content - Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Header Card -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ $alquiler->id ?? 'ALQ-2025-089' }}</h1>
                        <p class="text-sm text-gray-500 mt-1">Creado el {{ $alquiler->created_at ?? '01/02/2025' }}</p>
                    </div>
                    <x-status-badge :status="$alquiler->estado ?? 'activo'" />
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Cliente</p>
                        <p class="text-sm font-medium text-gray-900">{{ $alquiler->cliente->nombre ?? 'María González' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Fecha Evento</p>
                        <p class="text-sm font-medium text-gray-900">{{ $alquiler->fecha_contrato ?? '15/02/2025' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Entrega</p>
                        <p class="text-sm font-medium text-gray-900">{{ $alquiler->fecha_entrega_prevista ?? '14/02/2025' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Retiro</p>
                        <p class="text-sm font-medium text-gray-900">{{ $alquiler->fecha_devolucion_prevista ?? '16/02/2025' }}</p>
                    </div>
                </div>
            </div>

            <!-- Cliente Info -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Información del Cliente</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Nombre Completo</p>
                        <p class="text-sm font-medium text-gray-900">{{ $alquiler->cliente->nombre ?? 'María González Pérez' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Teléfono</p>
                        <p class="text-sm font-medium text-gray-900">{{ $alquiler->cliente->telefono ?? '+591 7123-4567' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Email</p>
                        <p class="text-sm font-medium text-gray-900">{{ $alquiler->cliente->email ?? 'maria.gonzalez@email.com' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Dirección Evento</p>
                        <p class="text-sm font-medium text-gray-900">{{ $alquiler->direccion_evento ?? 'Av. Principal 123, La Paz' }}</p>
                    </div>
                </div>
            </div>

            <!-- Detalles del Alquiler -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Paquetes y Costos</h2>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Paquete</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Precio Unit.</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Períodos</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @if(isset($alquiler) && $alquiler->detalles)
                                @foreach($alquiler->detalles as $detalle)
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-900">{{ $detalle->paquete->nombre }}</td>
                                        <td class="px-4 py-3 text-sm text-right">{{ $detalle->cantidad_paquetes }}</td>
                                        <td class="px-4 py-3 text-sm text-right">Bs. {{ number_format($detalle->precio_bidiario_unit, 2) }}</td>
                                        <td class="px-4 py-3 text-sm text-right">{{ $detalle->num_bloques_contratados }}</td>
                                        <td class="px-4 py-3 text-sm font-medium text-right">Bs. {{ number_format($detalle->subtotal_contrato, 2) }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900">Paquete Boda Premium</td>
                                    <td class="px-4 py-3 text-sm text-right">1</td>
                                    <td class="px-4 py-3 text-sm text-right">Bs. 8,500.00</td>
                                    <td class="px-4 py-3 text-sm text-right">1</td>
                                    <td class="px-4 py-3 text-sm font-medium text-right">Bs. 8,500.00</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Totals -->
                <div class="mt-6 pt-4 border-t border-gray-200">
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal Alquiler:</span>
                            <span class="font-medium">Bs. {{ number_format($alquiler->subtotal ?? 8500, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Costo Transporte:</span>
                            <span class="font-medium">Bs. {{ number_format(($alquiler->total ?? 8500) - ($alquiler->subtotal ?? 8500), 2) }}</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold pt-2 border-t border-gray-200">
                            <span class="text-gray-900">Total:</span>
                            <span class="text-primary">Bs. {{ number_format($alquiler->total ?? 8500, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Observaciones -->
            @if(isset($alquiler->observaciones) && $alquiler->observaciones)
                <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Observaciones</h2>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-700">{{ $alquiler->observaciones }}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar - Right Column -->
        <div class="space-y-6">
            <!-- Acciones Rápidas -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100 sticky top-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Acciones</h3>

                <div class="space-y-3">
                    @if(isset($alquiler) && method_exists($alquiler, 'estado'))
                        @if($alquiler->estado == 'pendiente' || $alquiler->estado == 'reservado')
                            <button 
                                onclick="/* Marcar como entregado */"
                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-accent text-white font-medium rounded-lg hover:bg-accent/90 focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Marcar como Entregado
                            </button>
                        @elseif($alquiler->estado == 'entregado' || $alquiler->estado == 'activo')
                            <button 
                                onclick="/* Marcar como devuelto */"
                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                </svg>
                                Marcar como Devuelto
                            </button>
                        @endif
                    @else
                        <button 
                            onclick="/* Cambiar estado */"
                            class="w-full inline-flex items-center justify-center px-4 py-2 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                        >
                            Cambiar Estado
                        </button>
                    @endif

                    <button 
                        onclick="/* Imprimir contrato */"
                        class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Imprimir Contrato
                    </button>

                    <button 
                        onclick="/* Editar alquiler */"
                        class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Editar Alquiler
                    </button>

                    <button 
                        onclick="/* Cancelar alquiler */"
                        class="w-full inline-flex items-center justify-center px-4 py-2 border border-danger text-danger font-medium rounded-lg hover:bg-danger hover:text-white focus:outline-none focus:ring-2 focus:ring-danger focus:ring-offset-2 transition"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Cancelar Alquiler
                    </button>
                </div>
            </div>

            <!-- Historial -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Historial</h3>
                
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-accent rounded-full mt-2 mr-3"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Alquiler Creado</p>
                            <p class="text-xs text-gray-500 mt-1">01/02/2025 10:30</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-primary rounded-full mt-2 mr-3"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Confirmado por Cliente</p>
                            <p class="text-xs text-gray-500 mt-1">02/02/2025 14:20</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-gray-300 rounded-full mt-2 mr-3"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">Pendiente entrega</p>
                            <p class="text-xs text-gray-400 mt-1">14/02/2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>