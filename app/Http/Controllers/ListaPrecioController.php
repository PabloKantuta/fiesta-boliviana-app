<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListaPrecioController extends Controller
{
    /**
     * Mostrar listas de precios
     */
    public function index()
    {
        // Por ahora retornamos la vista con datos mock
        // Más adelante se conectará con el modelo ListaPrecio
        return view('listas-precios.index');
    }
}
