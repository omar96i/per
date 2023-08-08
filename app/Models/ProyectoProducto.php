<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyecto_id',
        'meta_producto_id',
        'indicador_id',
    ];

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }

    public function meta_producto(){
        return $this->belongsTo(MetaDeProducto::class);
    }

    public function indicador(){
        return $this->belongsTo(Indicador::class);
    }
}
