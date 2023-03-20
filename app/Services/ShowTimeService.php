<?php

namespace App\Services;


use App\Models\Film;

class ShowTimeService
{
    public $data;

    public  function showTimeCreate($time_start, $hall_id, $movieId): array
    {
        $this->data = [
            'time_start' => $time_start,
            'hall_id' => $hall_id,
            'film_id' => Film::class::find($movieId)->id,
            'time_interval' => Film::class::find($movieId)->duration,
        ];

        return $this->data;
    }


}
