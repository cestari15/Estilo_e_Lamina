<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'profissional',
        'cliente',
        'servico',
        'data',
        'hora',
        'tipo_pagamento',
        'valor'

    ];
}
