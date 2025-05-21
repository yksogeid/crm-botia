<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Numero extends Model
{
    protected $table = 'numeros';
    public $timestamps = false;
    
    protected $fillable = [
        'area',
        'numero'
    ];
}