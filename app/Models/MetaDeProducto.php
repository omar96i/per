<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaDeProducto extends Model
{
    use HasFactory;

    protected $table = 'meta_de_productos';

    protected $fillable = [
        'periodo_id',
        'hecho_id',
        'politica_id',
        'programa_id',
        'indicador_id',
        'user_id',
        'codigo',
        'nombre',
        'indicador_meta',
        'peso',
        'linea_base',
        'year',
        'meta_year_1',
        'meta_year_2',
        'meta_year_3',
        'meta_year_4',
        'meta_cuatrienio',
        'recurso_year_1',
        'recurso_year_2',
        'recurso_year_3',
        'recurso_year_4',
        'recurso_cuatrienio',
    ];

    public function hecho(){
        return $this->belongsTo(Hecho::class, 'hecho_id');
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }

    public function politica(){
        return $this->belongsTo(Politica::class, 'politica_id');
    }

    public function programa(){
        return $this->belongsTo(Programa::class, 'programa_id');
    }

    public function indicador(){
        return $this->belongsTo(Indicador::class, 'indicador_id');
    }

    public function user_asignado(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function evidencias(){
        return $this->hasMany(MetaDeProductoEvidencia::class);
    }
}
