<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //utilizan el softdelete(?)

class Venta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ventas';
    protected $fillable = ['clave_ext','nombre','codigo','codigo_sat','unidad','unidad_sat','almacenable','precio','costo','tipo','iva'];
}
