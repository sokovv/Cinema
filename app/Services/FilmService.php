<?php

namespace App\Services;


use App\Models\ShowTime;
use App\Models\Ticket;

class FilmService
{
    public $data;

    public  function filmCreate($title, $description, $duration, $poster): array
    {
        $this->data = [
            'title' => $title,
            'description' =>  $description,
            'duration' =>  $duration,
            'poster' => $poster,
        ];

        return $this->data;
    }


}
