<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Mostrar página de reportes
     */
    public function index()
    {
        return view('reportes.index');
    }
}
