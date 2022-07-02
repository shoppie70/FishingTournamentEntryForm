<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
    ];

    protected $casts = [
        'price' => 'integer',
    ];

    public static function getMenuPrice()
    {
        return self::find(1)->price;
    }
}
