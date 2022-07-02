<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'price',
        'user_id',
        'menu_id',
        'place_id',
        'is_cancelled',
    ];

    protected $casts = [
        'date' => 'date',
        'price' => 'integer',
        'user_id' => 'integer',
        'menu_id' => 'integer',
        'place_id' => 'integer',
        'is_cancelled' => 'boolean',
    ];

    // ToDo: GlobalScopeを追加する

    public function scopeMonthReserve($query, int $user_id, int $month)
    {
        return $query->where('user_id', $user_id)
            ->where('is_cancelled', false)
            ->whereMonth('date', $month);
    }

    public function scopeUserReserved($query, int $user_id, int $menu_id)
    {
        return $query->where('user_id', $user_id)
            ->where('menu_id', $menu_id);
    }

    public static function getNumberOfMonthReservation($month)
    {
        return self::whereMonth('date', $month)->where('is_cancelled', false)->count();
    }

    public static function getTotalAmountOfMonthReservation($month)
    {
        return self::whereMonth('date', $month)->where('is_cancelled', false)->sum('price');
    }

    public static function getNumberOfTodayReservation(int $place_id = null)
    {
        if (null === $place_id) {
            return self::where('date', date('Y-m-d'))
                ->where('is_cancelled', false)
                ->count();
        }

        return self::where('date', date('Y-m-d'))
            ->where('place_id', $place_id)
            ->where('is_cancelled', false)
            ->count();
    }

    public static function getNumberOfTomorrowReservation(int $place_id = null)
    {
        if (null === $place_id) {
            return self::where('date', date('Y-m-d', strtotime('tomorrow')))
                ->where('is_cancelled', false)
                ->count();
        }

        return self::where('date', date('Y-m-d', strtotime('tomorrow')))
            ->where('place_id', $place_id)
            ->where('is_cancelled', false)
            ->count();
    }

    public function place(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ReservationPlace::class);
    }

    public function menu(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
