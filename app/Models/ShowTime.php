<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ShowTime extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hall_id',
        'film_id',
        'time_interval',
        'time_start',
        'sold_place_vip',
        'sold_place_st',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'time_start' => 'datetime',
    ];


    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

}
