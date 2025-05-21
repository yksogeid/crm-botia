<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contexto extends Model
{
    protected $table = 'contextos';
    public $timestamps = false;
    
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
}