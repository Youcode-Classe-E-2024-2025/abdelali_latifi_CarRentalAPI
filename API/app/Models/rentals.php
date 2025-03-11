<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rentals extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'name',
        'email',
        'phone',
        'from',
        'to'
    ];
}
