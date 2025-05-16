<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class N8nMessage extends Model
{
    protected $table = 'n8n';
    
    protected $casts = [
        'message' => 'array',
    ];

    protected $fillable = [
        'session_id',
        'message',
    ];
}