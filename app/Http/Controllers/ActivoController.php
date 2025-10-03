<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use Illuminate\Http\Request;

class ActivoController extends Controller
{
    /**
     * Mostrar lista de activos (inventario)
     */
    public function index()
    {
        $activos = Activo::all();
        
        return view('activos.index', compact('activos'));
    }
}
