<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Alquileres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="text-lg font-bold">Listado de Alquileres</h1>
                        <a href="{{ route('alquileres.create') }}" class="btn btn-primary">Registrar Nuevo Alquiler</a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <hr class="my-4">

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Fecha Contrato</th>
                                <th>Fecha Entrega</th>
                                <th>Estado</th>
                                <th>Total (Bs.)</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alquileres as $alquiler)
                                <tr>
                                    <td>{{ $alquiler->id }}</td>
                                    <td>{{ $alquiler->cliente->nombre }}</td>
                                    <td>{{ $alquiler->fecha_contrato }}</td>
                                    <td>{{ $alquiler->fecha_entrega_prevista }}</td>
                                    <td><span class="badge bg-info">{{ $alquiler->estado }}</span></td>
                                    <td>{{ number_format($alquiler->total, 2) }}</td>
                                    <td>
                                        <a href="{{ route('alquileres.show', $alquiler) }}" class="btn btn-sm btn-info">Ver</a>
                                        <!--<a href="#" class="btn btn-sm btn-warning">Editar</a>-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>