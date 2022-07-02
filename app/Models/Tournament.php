<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path',
        'date',
        'capacity',
        'last_entry_number',
    ];

    protected $casts = [
        'name' => 'string',
        'image_path' => 'string',
        'date' => 'date',
        'capacity' => 'integer',
        'last_entry_number' => 'integer',
    ];
}
