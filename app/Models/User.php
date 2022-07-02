<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Front\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'staff_number',
        'department_id',
        'is_temporary',
        'is_retired',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => 'string',
        'staff_number' => 'string',
        'department_id' => 'integer',
        'is_temporary' => 'boolean',
        'is_retired' => 'boolean',
        'email' => 'string',
    ];

    protected static function boot(): void
    {
        parent::boot();
//        static::addGlobalScope('retired', static function(Builder $builder){
//            $builder->where('is_retired', '=', false);
//        });
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public static function getNumberOfUsers()
    {
        return self::where('is_retired', false)->where('is_temporary', false)->count();
    }

    // 月別の利用回数の取得
    public function getUsageMountByMonth(int $month)
    {
        return Reservation::MonthReserve($this->id, $month)->count();
    }

    // 月別の利用料金取得
    public function getUsageMoneyByMonth(int $month)
    {
        return Reservation::MonthReserve($this->id, $month)->sum('price');
    }

    public function scopeStaffNumber($query, int $staff_number)
    {
        return $query->where('staff_number', $staff_number);
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
