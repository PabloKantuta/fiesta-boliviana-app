<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;

    protected $table = 'alquileres';
    protected $guarded = [];

    /**
     * Define la relación: Un Alquiler pertenece a un Cliente.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Define la relación: Un Alquiler tiene muchos detalles (líneas de producto).
     */
    public function detalles()
    {
        return $this->hasMany(AlquilerDetalle::class);
    }

    /**
     * Define la relación: Un Alquiler tiene muchos activos asignados.
     */
    public function activosAsignados()
    {
        return $this->belongsToMany(Activo::class, 'alquiler_asignacion_activo', 'alquiler_id', 'activo_id');
    }
}