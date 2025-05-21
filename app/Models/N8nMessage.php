<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class N8nMessage extends Model
{
    protected $table = 'history_conversations';
    protected $connection = 'mysql';
    
    public $timestamps = false;

    protected $fillable = [
        'answerUser',
        'responseAI',
        'fechaAnswerUser',
        'fechaResponseAI',
        'numero'
    ];

    protected $casts = [
        'fechaAnswerUser' => 'datetime',
        'fechaResponseAI' => 'datetime'
    ];
}