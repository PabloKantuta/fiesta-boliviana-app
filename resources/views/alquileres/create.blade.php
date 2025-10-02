<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nuevo Alquiler') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('alquileres.preview') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="cliente_id" class="form-label">Cliente</label>
                            <select class="form-select" id="cliente_id" name="cliente_id" required>
                                <option value="">-- Seleccione un Cliente --</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="paquete_id" class="form-label">Paquete Decorativo</label>
                            <select class="form-select" id="paquete_id" name="paquete_id" required>
                                <option value="">-- Seleccione un Paquete --</option>
                                @foreach ($paquetes as $paquete)
                                    <option value="{{ $paquete->id }}">{{ $paquete->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="fecha_entrega_prevista" class="form-label">Fecha de Entrega</label>
                            <input type="date" class="form-control" id="fecha_entrega_prevista" name="fecha_entrega_prevista" required>
                            @error('fecha_entrega_prevista')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                            <div class="col-md-6 mb-3">
                                <label for="num_bloques_contratados" class="form-label">Nº de Períodos Bi-diarios</label>
                                <input type="number" class="form-control" id="num_bloques_contratados" name="num_bloques_contratados" min="1" value="1" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="ciudad" class="form-label">Ciudad del Evento</label>
                            <select class="form-select" id="ciudad" name="ciudad" required>
                                <option value="">-- Seleccione una Ciudad --</option>
                                @foreach ($ciudades as $ciudad)
                                    <option value="{{ $ciudad->nombre }}">{{ $ciudad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                         <div class="mb-3">
                            <label for="direccion_evento" class="form-label">Dirección del Evento</label>
                            <textarea class="form-control" id="direccion_evento" name="direccion_evento" rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="costo_transporte" class="form-label">Costo de Transporte (Bs.)</label>
                            <input type="number" step="0.01" class="form-control" id="costo_transporte" name="costo_transporte" value="0" required>
                        </div>

                        <div class="mb-3">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Registrar Alquiler</button>
                        <a href="{{ route('alquileres.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>