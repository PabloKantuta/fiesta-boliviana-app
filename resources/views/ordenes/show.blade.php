<x-app-layout>
    <x-slot name="header">Detalle de Orden Logística</x-slot>
    <x-slot name="title">Orden ORD-2025-045 - Sr Fiesta</x-slot>

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('ordenes.index') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900 font-medium">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Volver a órdenes
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Timeline - Left Column -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100 sticky top-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Timeline de Orden</h2>

                <div class="relative">
                    <!-- Vertical Line -->
                    <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200"></div>

                    <!-- Timeline Items -->
                    <div class="space-y-6">
                        <!-- Item 1 - Completed -->
                        <div class="relative flex items-start">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-accent text-white z-10">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-900">Orden Creada</p>
                                <p class="text-xs text-gray-500 mt-1">01/02/2025 10:30</p>
                                <p class="text-xs text-gray-600 mt-1">Por: Juan Pérez</p>
                            </div>
                        </div>

                        <!-- Item 2 - Completed -->
                        <div class="relative flex items-start">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-accent text-white z-10">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-900">Items Preparados</p>
                                <p class="text-xs text-gray-500 mt-1">02/02/2025 14:00</p>
                                <p class="text-xs text-gray-600 mt-1">Por: Ana López</p>
                            </div>
                        </div>

                        <!-- Item 3 - Current -->
                        <div class="relative flex items-start">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-primary text-white z-10 ring-4 ring-primary/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-900">Cargando Vehículo</p>
                                <p class="text-xs text-gray-500 mt-1">Programado: 14/02/2025 12:00</p>
                                <p class="text-xs text-primary font-medium mt-1">En proceso</p>
                            </div>
                        </div>

                        <!-- Item 4 - Pending -->
                        <div class="relative flex items-start">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 text-gray-400 z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-500">En Tránsito</p>
                                <p class="text-xs text-gray-400 mt-1">Pendiente</p>
                            </div>
                        </div>

                        <!-- Item 5 - Pending -->
                        <div class="relative flex items-start">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 text-gray-400 z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-500">Entregado</p>
                                <p class="text-xs text-gray-400 mt-1">Pendiente</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <button 
                        onclick="/* Actualizar estado */"
                        class="w-full px-4 py-2 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                    >
                        Actualizar Estado
                    </button>
                </div>
            </div>
        </div>

        <!-- Details - Right Columns -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Order Info -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-900">Información de Orden</h2>
                    <x-status-badge status="en_proceso" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Código de Orden</p>
                        <p class="text-sm font-semibold text-gray-900">ORD-2025-045</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Tipo</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            Entrega
                        </span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Alquiler Asociado</p>
                        <a href="#" class="text-sm font-medium text-primary hover:underline">ALQ-2025-089</a>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Cliente</p>
                        <p class="text-sm font-medium text-gray-900">María González Pérez</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Fecha Programada</p>
                        <p class="text-sm font-medium text-gray-900">14/02/2025 - 14:00 hrs</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Dirección</p>
                        <p class="text-sm text-gray-900">Av. Principal 123, La Paz</p>
                    </div>
                </div>
            </div>

            <!-- Items List -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Items a Entregar</h2>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Código</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Item</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-3 text-sm font-mono text-gray-600">SILLA-001</td>
                                <td class="px-4 py-3 text-sm text-gray-900">Silla Tiffany Blanca</td>
                                <td class="px-4 py-3 text-sm text-right font-medium">200</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">
                                        ✓ Listo
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 text-sm font-mono text-gray-600">MESA-015</td>
                                <td class="px-4 py-3 text-sm text-gray-900">Mesa Redonda 10 personas</td>
                                <td class="px-4 py-3 text-sm text-right font-medium">20</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">
                                        ✓ Listo
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 text-sm font-mono text-gray-600">MANT-023</td>
                                <td class="px-4 py-3 text-sm text-gray-900">Mantel Blanco Premium</td>
                                <td class="px-4 py-3 text-sm text-right font-medium">20</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                        ⏱ En proceso
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Notes -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Notas y Observaciones</h2>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm text-gray-700">Cliente solicita entrega temprana (antes de las 13:00). Confirmar acceso al salón con el encargado del lugar.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
