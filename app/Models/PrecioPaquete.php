<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrecioPaquete extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'precios_paquete';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false; // Tu tabla no tiene created_at/updated_at

    /**
     * Define la relación: Un precio pertenece a un Paquete.
     */
    public function paquete()
    {
        return $this->belongsTo(Paquete::class);
    }
}