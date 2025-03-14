<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'user_id',
        'car_id',
        'amount',
        'payment_method',
    ];
}
