<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlquilerAsignacionActivo extends Model
{
    use HasFactory;

    protected $table = 'alquiler_asignacion_activo';
    protected $guarded = [];
    public $timestamps = false;

    /**
     * Define la relación: Una asignación pertenece a un Alquiler.
     */
    public function alquiler()
    {
        return $this->belongsTo(Alquiler::class);
    }

    /**
     * Define la relación: Una asignación se refiere a un Activo.
     */
    public function activo()
    {
        return $this->belongsTo(Activo::class);
    }
}