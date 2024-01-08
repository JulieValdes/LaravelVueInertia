<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //utilizan el softdelete(?)

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'personas';
    protected $fillable = ['nombre', 'alias', 'email', 'rfc', 'numero_ext', 'numero_int' , 'direccion', 'tipo_persona'];
    
}
