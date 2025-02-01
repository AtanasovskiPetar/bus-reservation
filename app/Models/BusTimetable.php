<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusTimetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id',
        'day',
        'departure_time',
    ];
}
