<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentFish extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'fish_id',
    ];

    protected $casts = [
        'tournament_id' => 'integer',
        'fish_id' => 'integer',
    ];

    public function tournament(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }

    public function fish(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Fish::class, 'fish_id');
    }
}
