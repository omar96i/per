<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaDeProductoEvidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta_de_producto_id',
        'meta_alcanzada',
        'nueva_actividad',
        'codigo',
        'linea_base',
        'definiciones',
        'medicion',
        'formula',
        'variables',
        'fuente',
        'localizacion',
        'poblacion',
        'periocidad',
        'observaciones',
        'actividades_realizadas',
        'archivos',
        'tipo',
    ];

    public function meta(){
        return $this->belongsTo(MetaDeProducto::class);
    }
}
