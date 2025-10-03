<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Paquete;
use App\Models\Alquiler;
use App\Models\Ciudad;
use App\Models\AlquilerDetalle;
use Carbon\Carbon;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Buscamos todos los alquileres en la base de datos.
        // Usamos with('cliente') para cargar también la información del cliente relacionado
        // y así evitar consultas extra a la base de datos (mejora el rendimiento).
        $alquileres = Alquiler::with('cliente')->latest()->get();

        // Mostramos la vista 'index' y le pasamos la lista de alquileres.
        return view('alquileres.index', compact('alquileres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $paquetes = Paquete::all();
        $ciudades = Ciudad::all(); 

        return view('alquileres.create', compact('clientes', 'paquetes', 'ciudades'));
    }

    public function preview(Request $request)
    {
        // 1. --- VALIDACIÓN DE DATOS DEL FORMULARIO ---
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'paquete_id' => 'required|exists:paquetes,id',
            'fecha_entrega_prevista' => 'required|date',
            'num_bloques_contratados' => 'required|integer|min:1',
            'costo_transporte' => 'required|numeric|min:0',
            'ciudad' => 'required|string|max:100',
            'direccion_evento' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        // 2. --- CÁLCULO DE FECHAS ---
        $fechaEntrega = Carbon::parse($validatedData['fecha_entrega_prevista']);
        $diasDeAlquiler = $validatedData['num_bloques_contratados'] * 2;
        $fechaDevolucion = $fechaEntrega->copy()->addDays($diasDeAlquiler);

        // 3. --- VALIDACIÓN DE DISPONIBILIDAD ---
        $conflictingAlquiler = Alquiler::whereHas('detalles', function ($query) use ($validatedData) {
                $query->where('paquete_id', $validatedData['paquete_id']);
            })
            ->where('fecha_entrega_prevista', '<', $fechaDevolucion)
            ->where('fecha_devolucion_prevista', '>', $fechaEntrega)
            ->where('estado', '!=', 'cancelado')
            ->exists();

        if ($conflictingAlquiler) {
            return back()->withInput()->withErrors(['fecha_entrega_prevista' => 'El paquete seleccionado ya está reservado para las fechas indicadas.']);
        }
        
        $paquete = Paquete::with('items')->find($validatedData['paquete_id']);

        // 4. --- CÁLCULOS DE COSTOS  ---
        // Buscamos el precio en la base de datos
        $precioInfo = \App\Models\PrecioPaquete::where('paquete_id', $validatedData['paquete_id'])
                                            ->where('tipo', 'alquiler_bidiario')
                                            ->first(); // Obtenemos el primer precio que coincida

        // Verificamos si se encontró un precio
        if (!$precioInfo) {
            return back()->withInput()->withErrors(['paquete_id' => 'El paquete seleccionado no tiene un precio de alquiler configurado.']);
        }
        
        $precio_bidiario = $precioInfo->monto; // Usamos el monto de la BD

        $subtotal = $precio_bidiario * $validatedData['num_bloques_contratados'];
        $total = $subtotal + $validatedData['costo_transporte'];

        // Juntamos todos los datos en un array para manejarlos fácilmente
        $alquilerData = array_merge($validatedData, [
            'fecha_devolucion_prevista' => $fechaDevolucion,
            'subtotal' => $subtotal,
            'total' => $total,
            'precio_bidiario_unit' => $precio_bidiario,
            'cliente' => Cliente::find($validatedData['cliente_id']),
            'paquete' => $paquete,
        ]);

        // 5. --- GUARDADO TEMPORAL Y VISTA ---
        $request->session()->put('alquiler_data', $alquilerData);

        return view('alquileres.confirm', compact('alquilerData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. OBTENEMOS LOS DATOS DE LA SESIÓN
        $alquilerData = $request->session()->get('alquiler_data');

        // Si por alguna razón no hay datos, lo enviamos de vuelta al formulario para evitar un error.
        if (!$alquilerData) {
            return redirect()->route('alquileres.create');
        }

        // 2. GUARDAMOS EN LA BASE DE DATOS USANDO LOS DATOS DE LA SESIÓN
        $alquiler = Alquiler::create([
            'cliente_id' => $alquilerData['cliente_id'],
            'fecha_contrato' => now(),
            'fecha_entrega_prevista' => $alquilerData['fecha_entrega_prevista'],
            'fecha_devolucion_prevista' => $alquilerData['fecha_devolucion_prevista'],
            'ciudad' => $alquilerData['ciudad'],
            'direccion_evento' => $alquilerData['direccion_evento'],
            'subtotal' => $alquilerData['subtotal'],
            'total' => $alquilerData['total'],
            'pagado' => true,
            'estado' => 'reservado',
            'observaciones' => $alquilerData['observaciones'],
        ]);

        AlquilerDetalle::create([
            'alquiler_id' => $alquiler->id,
            'paquete_id' => $alquilerData['paquete_id'],
            'cantidad_paquetes' => 1,
            'precio_bidiario_unit' => $alquilerData['precio_bidiario_unit'],
            'num_bloques_contratados' => $alquilerData['num_bloques_contratados'],
            'subtotal_contrato' => $alquilerData['subtotal'],
        ]);

        // 3. LIMPIAMOS LOS DATOS TEMPORALES DE LA SESIÓN
        $request->session()->forget('alquiler_data');

        // 4. REDIRIGIMOS CON UN MENSAJE DE ÉXITO
        return redirect()->route('alquileres.index')->with('success', '¡Alquiler confirmado y registrado exitosamente!');
}

    /**
     * Display the specified resource.
     */
    public function show(Alquiler $alquiler)
    {
        // Cargamos las relaciones para asegurar que tenemos todos los datos
        $alquiler->load('cliente', 'detalles.paquete');

        // Retornamos la nueva vista y le pasamos los datos del alquiler
        return view('alquileres.show', compact('alquiler'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateStatus(Request $request, Alquiler $alquiler)
    {
        // Valida que el estado enviado sea uno de los permitidos
        $request->validate([
            'estado' => 'required|in:entregado,devuelto',
        ]);

        // Actualiza el campo 'estado' del alquiler
        $alquiler->estado = $request->estado;
        $alquiler->save();

        // Redirige de vuelta a la misma página con un mensaje de éxito
        return back()->with('success', '¡Estado del alquiler actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Cancel the rental
     */
    public function cancel(Alquiler $alquiler)
    {
        // Solo se puede cancelar si no está en estado devuelto o cancelado
        if (in_array($alquiler->estado, ['devuelto', 'cancelado'])) {
            return back()->with('error', 'No se puede cancelar un alquiler que ya está devuelto o cancelado.');
        }

        $alquiler->estado = 'cancelado';
        $alquiler->save();

        return redirect()->route('alquileres.index')->with('success', 'Alquiler cancelado correctamente.');
    }

    /**
     * Print rental contract
     */
    public function print(Alquiler $alquiler)
    {
        // Cargamos las relaciones necesarias
        $alquiler->load('cliente', 'detalles.paquete.items');

        // Retornamos una vista específica para imprimir
        return view('alquileres.print', compact('alquiler'));
    }
}
