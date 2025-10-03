<x-app-layout>
    <x-slot name="header">Registrar Nuevo Alquiler</x-slot>
    <x-slot name="title">Crear Alquiler - Sr Fiesta</x-slot>

    <!-- Form Container -->
    <div class="bg-white rounded-2xl shadow-card p-8 border border-gray-100">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Información del Alquiler</h2>
        
        <!-- Formulario -->
        <form 
            method="POST" 
            action="{{ route('alquileres.preview') }}"
            class="space-y-6"
        >
            @csrf

            <!-- Información del Cliente y Paquete -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Cliente -->
                <div>
                    <label for="cliente_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Cliente <span class="text-red-500">*</span>
                    </label>
                    <select 
                        id="cliente_id" 
                        name="cliente_id" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                    >
                        <option value="">Seleccione un cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('cliente_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Paquete -->
                <div>
                    <label for="paquete_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Paquete <span class="text-red-500">*</span>
                    </label>
                    <select 
                        id="paquete_id" 
                        name="paquete_id" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                    >
                        <option value="">Seleccione un paquete</option>
                        @foreach($paquetes as $paquete)
                            <option value="{{ $paquete->id }}" {{ old('paquete_id') == $paquete->id ? 'selected' : '' }}>
                                {{ $paquete->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('paquete_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Detalles de la Entrega -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Fecha de Entrega -->
                <div>
                    <label for="fecha_entrega_prevista" class="block text-sm font-medium text-gray-700 mb-2">
                        Fecha de Entrega Prevista <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="date" 
                        id="fecha_entrega_prevista" 
                        name="fecha_entrega_prevista" 
                        value="{{ old('fecha_entrega_prevista') }}"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                    >
                    @error('fecha_entrega_prevista')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Número de Bloques -->
                <div>
                    <label for="num_bloques_contratados" class="block text-sm font-medium text-gray-700 mb-2">
                        Numero de Bi-Diarios <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="num_bloques_contratados" 
                        name="num_bloques_contratados" 
                        value="{{ old('num_bloques_contratados', 1) }}"
                        min="1"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                    >
                    @error('num_bloques_contratados')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ciudad -->
                <div>
                    <label for="ciudad" class="block text-sm font-medium text-gray-700 mb-2">
                        Ciudad <span class="text-red-500">*</span>
                    </label>
                    <select 
                        id="ciudad" 
                        name="ciudad" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                    >
                        <option value="">Seleccione una ciudad</option>
                        @foreach($ciudades as $ciudad)
                            <option value="{{ $ciudad->nombre }}" {{ old('ciudad') == $ciudad->nombre ? 'selected' : '' }}>
                                {{ $ciudad->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('ciudad')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Costo de Transporte -->
                <div>
                    <label for="costo_transporte" class="block text-sm font-medium text-gray-700 mb-2">
                        Costo de Transporte (Bs) <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="costo_transporte" 
                        name="costo_transporte" 
                        value="{{ old('costo_transporte', 0) }}"
                        min="0"
                        step="0.01"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                    >
                    @error('costo_transporte')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dirección del Evento -->
                <div class="md:col-span-2">
                    <label for="direccion_evento" class="block text-sm font-medium text-gray-700 mb-2">
                        Dirección del Evento <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        id="direccion_evento" 
                        name="direccion_evento" 
                        rows="3"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                    >{{ old('direccion_evento') }}</textarea>
                    @error('direccion_evento')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Observaciones -->
            <div>
                <label for="observaciones" class="block text-sm font-medium text-gray-700 mb-2">
                    Observaciones
                </label>
                <textarea 
                    id="observaciones" 
                    name="observaciones" 
                    rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                    placeholder="Agregue cualquier observación adicional sobre el alquiler..."
                >{{ old('observaciones') }}</textarea>
                @error('observaciones')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones de Acción -->
            <div class="flex items-center justify-between pt-4 border-t">
                <a 
                    href="{{ route('alquileres.index') }}"
                    class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Cancelar
                </a>

                <button 
                    type="submit"
                    class="inline-flex items-center px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                >
                    Previsualizar
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
