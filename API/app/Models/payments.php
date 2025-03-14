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
        'amount',
        'payment_method',
        'created_at',
        'updated_at'
    ];
}
