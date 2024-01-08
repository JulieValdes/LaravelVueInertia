<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //utilizan el softdelete(?)

class Servicio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'servicios';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'tipo'];
}
