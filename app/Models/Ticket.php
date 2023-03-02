<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Ticket extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'show_times_id',
        'places_id',
        'films_id',
        'title',
        'row',
        'place',
        'qr',
    ];

    public function show_times()
    {
        return $this->hasOne(ShowTime::class);
    }

    public function places()
    {
        return $this->belongsTo(Place::class);
    }

    public function films()
    {
        return $this->belongsTo(Film::class);
    }

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

    ];
}
