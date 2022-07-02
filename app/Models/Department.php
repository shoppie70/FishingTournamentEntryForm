<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'place_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'place_id' => 'integer',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function place()
    {
        return $this->belongsTo(ReservationPlace::class);
    }
}
