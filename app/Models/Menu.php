<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'main_dish',
        'side_dish1',
        'side_dish2',
        'side_dish3',
        'is_rest',
    ];

    protected $casts = [
        'date' => 'date',
        'is_rest' => 'bool',
    ];

    public function scopeMonth($query, $target_month)
    {
        return $query->whereMonth('date', $target_month);
    }

    public function reservation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public static function getLatestMenus()
    {
        $current = Carbon::now();
        $to = $current->copy()->addDays(4);

        return self::whereBetween('date', [$current->format('Y-m-d'), $to->format('Y-m-d')])
            ->orderBy('date', 'ASC')
            ->get();
    }
}
