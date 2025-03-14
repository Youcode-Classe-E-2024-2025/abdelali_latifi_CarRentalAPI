<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rentals extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'from',
        'to',
        'total_price',
    ];

    public function car()
    {
        return $this->belongsTo(Cars::class);
    }

    public function getDays()
    {
        $from = new \DateTime($this->from);
        $to = new \DateTime($this->to);
        return $from->diff($to)->days;
    }
}
