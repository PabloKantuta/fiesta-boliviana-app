<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    use HasFactory;

    protected $table = 'activos';
    protected $guarded = [];

    /**
     * Define la relación: Un activo corresponde a un tipo de Item.
     * (Ej: El activo 'SILLA-001' es del item 'Silla Tiffany Blanca')
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}