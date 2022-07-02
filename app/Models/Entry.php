<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'selected_fish_id_1',
        'selected_fish_id_2',
        'name',
        'email',
        'tel',
        'is_join_fellowship',
        'entry_number'
    ];

    protected $casts = [
        'tournament_id' => 'integer',
        'selected_fish_id_1' => 'integer',
        'selected_fish_id_2' => 'integer',
        'is_join_fellowship' => 'boolean',
        'entry_number' => 'integer'
    ];

    public function tournament(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tournament::class,'tournament_id');
    }

    public function selected_fish_1(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Fish::class,'selected_fish_id_1');
    }

    public function selected_fish_2(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Fish::class,'selected_fish_id_2');
    }
}
