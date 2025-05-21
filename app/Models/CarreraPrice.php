<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarreraPrice extends Model
{
    protected $table = 'carrera_price';
    public $timestamps = false;
    
    protected $fillable = [
        'carrera',
        'precio'
    ];

    protected $casts = [
        'precio' => 'array'
    ];
}