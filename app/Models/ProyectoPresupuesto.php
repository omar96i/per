<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoPresupuesto extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyecto_id',
        'codigo',
        'inicial',
        'definitivo',
        'certificado',
        'comprometido',
        'ordenes_de_pago',
    ];

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }

    public function movimiento_financieros(){
        return $this->hasMany(ProyectoMovimientoFinanciero::class);
    }

    public function certificados(){
        return $this->hasMany(ProyectoCertificado::class);
    }
}
