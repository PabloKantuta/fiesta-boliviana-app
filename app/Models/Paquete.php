<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paquete extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Define la relación: Un Paquete puede tener muchos precios.
     */
    public function precios()
    {
        return $this->hasMany(PrecioPaquete::class);
    }

    /**
     * Define la relación: Un Paquete se compone de muchos Items.
     */
    public function items()
    {
        // belongsToMany(Modelo, tabla_pivote, fk_propia, fk_relacionada)
        return $this->belongsToMany(Item::class, 'item_paquete', 'paquete_id', 'item_id')
                    ->withPivot('cantidad_por_paquete'); // Importante para obtener la cantidad
    }
}