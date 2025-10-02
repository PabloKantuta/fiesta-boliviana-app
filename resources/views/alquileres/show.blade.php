<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalles del Alquiler #{{ $alquiler->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4">
                        <a href="{{ route('alquileres.index') }}" class="btn btn-secondary"> < Volver a la lista</a>
                    </div>

                    <h3 class="text-lg font-bold">Información del Cliente</h3>
                    <p><strong>Nombre:</strong> {{ $alquiler->cliente->nombre }}</p>
                    <p><strong>Email:</strong> {{ $alquiler->cliente->email }}</p>
                    <p><strong>Teléfono:</strong> {{ $alquiler->cliente->telefono }}</p>

                    <hr class="my-4">

                    <h3 class="text-lg font-bold">Datos del Alquiler</h3>
                    <p><strong>Estado Actual:</strong> <span class="badge bg-info text-uppercase">{{ $alquiler->estado }}</span></p>
                    <p><strong>Fecha de Contrato:</strong> {{ $alquiler->fecha_contrato }}</p>
                    <p><strong>Fecha de Entrega Prevista:</strong> {{ $alquiler->fecha_entrega_prevista }}</p>
                    <p><strong>Fecha de Devolución Prevista:</strong> {{ $alquiler->fecha_devolucion_prevista }}</p>

                    <hr class="my-4">

                    <h3 class="text-lg font-bold">Detalles y Costos</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Paquete</th>
                                <th>Cantidad</th>
                                <th>Precio Bi-diario</th>
                                <th>Nº Períodos</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alquiler->detalles as $detalle)
                            <tr>
                                <td>{{ $detalle->paquete->nombre }}</td>
                                <td>{{ $detalle->cantidad_paquetes }}</td>
                                <td>{{ number_format($detalle->precio_bidiario_unit, 2) }} Bs.</td>
                                <td>{{ $detalle->num_bloques_contratados }}</td>
                                <td>{{ number_format($detalle->subtotal_contrato, 2) }} Bs.</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-end">
                        <p><strong>Subtotal Alquiler:</strong> {{ number_format($alquiler->subtotal, 2) }} Bs.</p>
                        <p><strong>Transporte:</strong> {{ number_format($alquiler->total - $alquiler->subtotal, 2) }} Bs.</p>
                        <h4 class="font-bold"><strong>Total Pagado:</strong> {{ number_format($alquiler->total, 2) }} Bs.</h4>
                    </div>

                    <hr class="my-4">
                      
                      <h3 class="text-lg font-bold mt-4">Actualizar Estado</h3>

                      @if (session('success'))
                          <div class="alert alert-success mt-2">
                              {{ session('success') }}
                          </div>
                      @endif

                      <form action="{{ route('alquileres.updateStatus', $alquiler) }}" method="POST" class="mt-2">
                          @csrf
                          
                          @if ($alquiler->estado == 'reservado')
                              <button type="submit" name="estado" value="entregado" class="btn btn-success">Marcar como Entregado</button>
                          @elseif ($alquiler->estado == 'entregado')
                              <button type="submit" name="estado" value="devuelto" class="btn btn-warning">Marcar como Devuelto</button>
                          @else
                              <p>Este alquiler ya ha sido completado o cancelado.</p>
                          @endif
                      </form>
                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>