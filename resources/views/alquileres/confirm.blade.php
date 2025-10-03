<x-app-layout>
    <x-slot name="header">Confirmar Nuevo Alquiler</x-slot>
    <x-slot name="title">Confirmar Alquiler - Sr Fiesta</x-slot>

    <!-- Alert de Confirmación -->
    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 mb-6">
        <div class="flex items-start">
            <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <h3 class="text-lg font-semibold text-blue-900 mb-1">Revisa los detalles antes de confirmar</h3>
                <p class="text-sm text-blue-700">Verifica que toda la información sea correcta antes de crear el alquiler.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Columna Principal -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Información del Cliente -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Información del Cliente
                </h3>
                <div class="space-y-3">
                    <div>
                        <span class="text-sm text-gray-500">Nombre del Cliente</span>
                        <p class="text-base font-medium text-gray-900">{{ $alquilerData['cliente']->nombre }}</p>
                    </div>
                    @if($alquilerData['cliente']->email)
                    <div>
                        <span class="text-sm text-gray-500">Email</span>
                        <p class="text-base font-medium text-gray-900">{{ $alquilerData['cliente']->email }}</p>
                    </div>
                    @endif
                    @if($alquilerData['cliente']->telefono)
                    <div>
                        <span class="text-sm text-gray-500">Teléfono</span>
                        <p class="text-base font-medium text-gray-900">{{ $alquilerData['cliente']->telefono }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Datos del Evento -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Datos del Evento
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <span class="text-sm text-gray-500">Ciudad</span>
                        <p class="text-base font-medium text-gray-900">{{ $alquilerData['ciudad'] }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Fecha de Entrega</span>
                        <p class="text-base font-medium text-gray-900">{{ \Carbon\Carbon::parse($alquilerData['fecha_entrega_prevista'])->format('d/m/Y') }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <span class="text-sm text-gray-500">Dirección del Evento</span>
                        <p class="text-base font-medium text-gray-900">{{ $alquilerData['direccion_evento'] }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Fecha de Devolución</span>
                        <p class="text-base font-medium text-gray-900">{{ $alquilerData['fecha_devolucion_prevista']->format('d/m/Y') }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Duración</span>
                        <p class="text-base font-medium text-gray-900">{{ $alquilerData['num_bloques_contratados'] }} período(s) bi-diario(s)</p>
                    </div>
                </div>
                @if($alquilerData['observaciones'])
                <div class="mt-4 pt-4 border-t">
                    <span class="text-sm text-gray-500">Observaciones</span>
                    <p class="text-base font-medium text-gray-900">{{ $alquilerData['observaciones'] }}</p>
                </div>
                @endif
            </div>

            <!-- Componentes del Paquete -->
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    Componentes del Paquete: {{ $alquilerData['paquete']->nombre }}
                </h3>
                <div class="space-y-2">
                    @foreach ($alquilerData['paquete']->items as $item)
                        <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
                            <span class="text-gray-700">{{ $item->nombre }}</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary/10 text-primary">
                                {{ $item->pivot->cantidad_por_paquete }} unidades
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Columna Lateral - Resumen de Costos -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100 sticky top-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Resumen de Costos</h3>
                
                <div class="space-y-3 mb-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Paquete</span>
                        <span class="font-medium text-gray-900">{{ $alquilerData['paquete']->nombre }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Precio bi-diario</span>
                        <span class="font-medium text-gray-900">Bs. {{ number_format($alquilerData['precio_bidiario_unit'], 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Nº períodos</span>
                        <span class="font-medium text-gray-900">{{ $alquilerData['num_bloques_contratados'] }}</span>
                    </div>
                </div>

                <div class="border-t pt-3 space-y-2 mb-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Subtotal Alquiler</span>
                        <span class="font-medium text-gray-900">Bs. {{ number_format($alquilerData['subtotal'], 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Transporte</span>
                        <span class="font-medium text-gray-900">Bs. {{ number_format($alquilerData['costo_transporte'], 2) }}</span>
                    </div>
                </div>

                <div class="border-t pt-3 mb-6">
                    <div class="flex justify-between items-center">
                        <span class="text-base font-semibold text-gray-900">Total a Pagar</span>
                        <span class="text-2xl font-bold text-primary">Bs. {{ number_format($alquilerData['total'], 2) }}</span>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="space-y-3">
                    <form action="{{ route('alquileres.store') }}" method="POST" class="w-full">
                        @csrf
                        <button 
                            type="submit"
                            class="w-full inline-flex items-center justify-center px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Confirmar y Guardar
                        </button>
                    </form>
                    
                    <a 
                        href="{{ route('alquileres.create') }}"
                        class="w-full inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                        </svg>
                        Volver a Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
