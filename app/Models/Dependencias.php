<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    use HasFactory;
    protected $table = 'dependencias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'info_dependencia',
        'mision',
        'vision',
        'organigrama'
    ];
}
