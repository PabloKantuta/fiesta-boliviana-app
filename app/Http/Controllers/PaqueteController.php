<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    /**
     * Mostrar lista de paquetes
     */
    public function index()
    {
        $paquetes = Paquete::all();
        
        return view('paquetes.index', compact('paquetes'));
    }

    /**
     * Mostrar detalle de un paquete
     */
    public function show(Paquete $paquete)
    {
        // Cargar relaciones necesarias
        $paquete->load('items', 'precios');
        
        return view('paquetes.show', compact('paquete'));
    }
}
