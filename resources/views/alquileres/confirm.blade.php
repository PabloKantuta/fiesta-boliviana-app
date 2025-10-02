<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Confirmar Nuevo Alquiler
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="text-2xl font-bold mb-4">Por favor, revisa los detalles antes de confirmar</h2>

                    <h3 class="text-lg font-bold">Información del Cliente</h3>
                    <p><strong>Nombre:</strong> {{ $alquilerData['cliente']->nombre }}</p>

                    <hr class="my-4">

                    <h3 class="text-lg font-bold">Datos del Alquiler</h3>
                    <p><strong>Ciudad del Evento:</strong> {{ $alquilerData['ciudad'] }}</p>
                    <p><strong>Dirección:</strong> {{ $alquilerData['direccion_evento'] }}</p>
                    <p><strong>Fecha de Entrega:</strong> {{ \Carbon\Carbon::parse($alquilerData['fecha_entrega_prevista'])->format('d/m/Y') }}</p>
                    <p><strong>Fecha de Devolución:</strong> {{ $alquilerData['fecha_devolucion_prevista']->format('d/m/Y') }}</p>

                    <hr class="my-4">

                    <h3 class="text-lg font-bold">Detalles y Costos</h3>
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Paquete</th>
                                <th>Precio Bi-diario</th>
                                <th>Nº Períodos</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $alquilerData['paquete']->nombre }}</td>
                                <td>{{ number_format($alquilerData['precio_bidiario_unit'], 2) }} Bs.</td>
                                <td>{{ $alquilerData['num_bloques_contratados'] }}</td>
                                <td>{{ number_format($alquilerData['subtotal'], 2) }} Bs.</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-end">
                        <p><strong>Subtotal Alquiler:</strong> {{ number_format($alquilerData['subtotal'], 2) }} Bs.</p>
                        <p><strong>Transporte:</strong> {{ number_format($alquilerData['costo_transporte'], 2) }} Bs.</p>
                        <h4 class="font-bold"><strong>Total a Pagar:</strong> {{ number_format($alquilerData['total'], 2) }} Bs.</h4>
                    </div>

                    <hr class="my-4">

                    {{-- BOTONES DE ACCIÓN --}}
                    <div class="mt-6 d-flex justify-content-between">
                        <a href="{{ route('alquileres.create') }}" class="btn btn-secondary">Cancelar y Volver a Editar</a>

                        <form action="{{ route('alquileres.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Confirmar y Guardar Alquiler</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>