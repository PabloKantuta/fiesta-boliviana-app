<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlquilerDetalle extends Model
{
    use HasFactory;

    // Como el nombre de la tabla no sigue la convención estándar, lo especificamos.
    protected $table = 'alquiler_detalle';

    protected $guarded = [];

    // Esta tabla no tiene las columnas created_at/updated_at, se lo indicamos a Laravel.
    public $timestamps = false;

    /**
     * Define la relación: Un detalle pertenece a un Alquiler.
     */
    public function alquiler()
    {
        return $this->belongsTo(Alquiler::class);
    }

    /**
     * Define la relación: Un detalle se refiere a un Paquete.
     */
    public function paquete()
    {
        return $this->belongsTo(Paquete::class);
    }
}