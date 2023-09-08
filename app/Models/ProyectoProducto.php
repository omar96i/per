<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyecto_id',
        'dependencia_id',
        'meta_producto_id',
        'porcentaje_definitivo',
        'porcentaje_disponibilidad',
        'porcentaje_registros',
        'porcentaje_pagos',
    ];

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }

    public function meta_producto(){
        return $this->belongsTo(MetaDeProducto::class);
    }

    public function dependencia(){
        return $this->belongsTo(Dependencia::class);
    }
}
