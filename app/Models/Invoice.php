<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'serves',
        'billing_amount',
    ];

    protected $casts = [
        'date' => 'date',
        'serves' => 'integer',
        'billing_amount' => 'integer',
        'created_at' => 'datetime',
    ];
}
