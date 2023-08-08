<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoMovimientoFinanciero extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyecto_presupuesto_id',
        'valor',
    ];

    public function presupuesto(){
        return $this->belongsTo(ProyectoPresupuesto::class);
    }
}
