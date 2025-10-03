<x-app-layout>
    <x-slot name="header">Nuevo Alquiler</x-slot>
    <x-slot name="title">Crear Alquiler - Fiesta Bolivia</x-slot>

    @php
        $step = request()->get('step', 1);
    @endphp

    <!-- Wizard Steps -->
    <x-wizard-steps :currentStep="$step" />

    <!-- Form Container -->
    <div class="bg-white rounded-2xl shadow-card p-8 border border-gray-100">
        <form action="{{ $step == 3 ? route('alquileres.store') : route('alquileres.create', ['step' => $step + 1]) }}" method="POST">
            @csrf

            @if($step == 1)
                <!-- Step 1: Cliente Info -->
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Información del Cliente</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="cliente_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Cliente <span class="text-danger">*</span>
                            </label>
                            <select 
                                id="cliente_id" 
                                name="cliente_id" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                required
                            >
                                <option value="">-- Seleccione un cliente --</option>
                                @if(isset($clientes))
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="1">María González Pérez</option>
                                    <option value="2">Carlos Pérez Ramos</option>
                                    <option value="3">Ana Rodríguez López</option>
                                @endif
                            </select>
                            <p class="mt-1 text-xs text-gray-500">O <a href="#" class="text-primary hover:underline">crear nuevo cliente</a></p>
                        </div>

                        <div>
                            <label for="tipo_evento" class="block text-sm font-medium text-gray-700 mb-2">
                                Tipo de Evento <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="tipo_evento" 
                                name="tipo_evento"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                placeholder="Ej: Boda, Cumpleaños, Corporativo"
                                required
                            >
                        </div>

                        <div>
                            <label for="fecha_evento" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha del Evento <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="date" 
                                id="fecha_evento" 
                                name="fecha_evento"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                required
                            >
                        </div>

                        <div>
                            <label for="hora_evento" class="block text-sm font-medium text-gray-700 mb-2">
                                Hora del Evento
                            </label>
                            <input 
                                type="time" 
                                id="hora_evento" 
                                name="hora_evento"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                            >
                        </div>

                        <div class="md:col-span-2">
                            <label for="direccion_evento" class="block text-sm font-medium text-gray-700 mb-2">
                                Dirección del Evento <span class="text-danger">*</span>
                            </label>
                            <textarea 
                                id="direccion_evento" 
                                name="direccion_evento"
                                rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                placeholder="Dirección completa donde se realizará el evento"
                                required
                            ></textarea>
                        </div>

                        <div>
                            <label for="ciudad" class="block text-sm font-medium text-gray-700 mb-2">
                                Ciudad <span class="text-danger">*</span>
                            </label>
                            <select 
                                id="ciudad" 
                                name="ciudad"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                required
                            >
                                <option value="">-- Seleccione --</option>
                                @if(isset($ciudades))
                                    @foreach($ciudades as $ciudad)
                                        <option value="{{ $ciudad->nombre }}">{{ $ciudad->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="La Paz">La Paz</option>
                                    <option value="Santa Cruz">Santa Cruz</option>
                                    <option value="Cochabamba">Cochabamba</option>
                                @endif
                            </select>
                        </div>

                        <div>
                            <label for="num_personas" class="block text-sm font-medium text-gray-700 mb-2">
                                Número de Personas
                            </label>
                            <input 
                                type="number" 
                                id="num_personas" 
                                name="num_personas"
                                min="1"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                placeholder="Capacidad estimada"
                            >
                        </div>
                    </div>
                </div>

            @elseif($step == 2)
                <!-- Step 2: Package Selection -->
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Selección de Paquetes</h2>
                    
                    <div class="mb-6">
                        <label for="paquete_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Paquete Principal <span class="text-danger">*</span>
                        </label>
                        <select 
                            id="paquete_id" 
                            name="paquete_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                            required
                        >
                            <option value="">-- Seleccione un paquete --</option>
                            @if(isset($paquetes))
                                @foreach($paquetes as $paquete)
                                    <option value="{{ $paquete->id }}">{{ $paquete->nombre }}</option>
                                @endforeach
                            @else
                                <option value="1">Paquete Boda Premium - Bs. 8,500</option>
                                <option value="2">Paquete Cumpleaños Infantil - Bs. 2,800</option>
                                <option value="3">Paquete Evento Corporativo - Bs. 5,500</option>
                            @endif
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="fecha_entrega" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha de Entrega <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="date" 
                                id="fecha_entrega" 
                                name="fecha_entrega"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                required
                            >
                        </div>

                        <div>
                            <label for="fecha_retiro" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha de Retiro <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="date" 
                                id="fecha_retiro" 
                                name="fecha_retiro"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                required
                            >
                        </div>

                        <div>
                            <label for="costo_transporte" class="block text-sm font-medium text-gray-700 mb-2">
                                Costo de Transporte
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-500">Bs.</span>
                                <input 
                                    type="number" 
                                    id="costo_transporte" 
                                    name="costo_transporte"
                                    step="0.01"
                                    value="0"
                                    class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                >
                            </div>
                        </div>

                        <div>
                            <label for="descuento" class="block text-sm font-medium text-gray-700 mb-2">
                                Descuento (%)
                            </label>
                            <input 
                                type="number" 
                                id="descuento" 
                                name="descuento"
                                min="0"
                                max="100"
                                step="0.01"
                                value="0"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="observaciones" class="block text-sm font-medium text-gray-700 mb-2">
                            Observaciones y Solicitudes Especiales
                        </label>
                        <textarea 
                            id="observaciones" 
                            name="observaciones"
                            rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                            placeholder="Detalles adicionales, solicitudes especiales, restricciones..."
                        ></textarea>
                    </div>
                </div>

            @else
                <!-- Step 3: Confirmation -->
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Confirmar Alquiler</h2>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                        <div class="flex">
                            <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <h3 class="text-sm font-medium text-blue-900">Revisa los detalles antes de confirmar</h3>
                                <p class="text-sm text-blue-700 mt-1">Verifica que toda la información sea correcta antes de crear el alquiler.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Summary Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Información del Cliente</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-xs text-gray-500">Cliente</p>
                                    <p class="text-sm font-medium text-gray-900">María González Pérez</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Evento</p>
                                    <p class="text-sm font-medium text-gray-900">Boda - 15/02/2025</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Ubicación</p>
                                    <p class="text-sm font-medium text-gray-900">Av. Principal 123, La Paz</p>
                                </div>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Detalles del Paquete</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-xs text-gray-500">Paquete</p>
                                    <p class="text-sm font-medium text-gray-900">Paquete Boda Premium</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Fechas</p>
                                    <p class="text-sm font-medium text-gray-900">Entrega: 14/02/2025 | Retiro: 16/02/2025</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Total</p>
                                    <p class="text-lg font-bold text-primary">Bs. 8,500.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Navigation Buttons -->
            <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-between">
                <div>
                    @if($step > 1)
                        <a 
                            href="{{ route('alquileres.create', ['step' => $step - 1]) }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Anterior
                        </a>
                    @else
                        <a 
                            href="{{ route('alquileres.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                        >
                            Cancelar
                        </a>
                    @endif
                </div>

                <button 
                    type="submit"
                    class="inline-flex items-center px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                >
                    @if($step == 3)
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Confirmar y Crear
                    @else
                        Siguiente
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    @endif
                </button>
            </div>
        </form>
    </div>
</x-app-layout>