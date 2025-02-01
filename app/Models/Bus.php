<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Bus extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function path()
    {
        return url("/bus/{$this->id}-".Str::slug($this->name));
    }

    public function timetables()
    {
        return $this->hasMany(BusTimetable::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
