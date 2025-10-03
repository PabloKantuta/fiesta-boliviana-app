<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * Mostrar lista de órdenes de logística
     */
    public function index()
    {
        // Por ahora retornamos la vista con datos mock
        // Más adelante se conectará con el modelo OrdenLogistica
        return view('ordenes.index');
    }

    /**
     * Mostrar detalle de una orden
     */
    public function show($id)
    {
        // Por ahora retornamos la vista con datos mock
        return view('ordenes.show');
    }
}
