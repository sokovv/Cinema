<?php

namespace App\Http\Livewire;

use App\Models\Film;
use App\Models\Hall;
use App\Models\ShowTime;
use Livewire\Component;

class SessionGrid extends Component
{
    public $title;
    public $description;
    public $duration;
    public $poster;
    public $hall;
    public $start_time;


    protected $rules = [
        'title' => 'required|max:300',
        'description' => 'required|max:999',
        'duration' => 'required|min:1|max:500',
        'poster' => 'required|max:30',
        'hall' => 'required|max:30',
        'start_time' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->duration,
            'poster' => $this->poster,
        ];

        Film::class::create($data);
    }

    public function submitShowTime($movieId)
    {
        $data = [
            'time_start' => $this->start_time,
            'hall_id' => $this->hall,
            'film_id' => Film::class::find($movieId)->id,
            'time_interval' => Film::class::find($movieId)->duration,
        ];
        ShowTime::class::create($data);
    }

    public function deleteFilm($idFilm)
    {
        Film::class::find($idFilm)->delete();
    }

    public function show_time_del($showId)
    {
        ShowTime::class::find($showId)->delete();
    }


    public function render()
    {
        return view('livewire.session-grid', ['films' => Film::class::get(), 'hallsShow' => Hall::class::get(), 'showTimes' => ShowTime::class::get()]);
    }
}
