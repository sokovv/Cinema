<?php

namespace App\Http\Livewire;

use App\Models\Film;
use App\Models\Hall;
use App\Models\ShowTime;
use App\Services\FilmService;
use App\Services\ShowTimeService;
use Livewire\Component;

class SessionGrid extends Component
{
    public $title;
    public $description;
    public $duration;
    public $poster;
    public $hall;
    public $startTime;


    protected $rules = [
        'title' => 'required|max:300',
        'description' => 'required|max:999',
        'duration' => 'required|min:1|max:500',
        'poster' => 'required|max:30',
        'hall' => 'required|max:30',
        'startTime' => 'required',
    ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function submit(): void
    {
        $filmService = new FilmService();
        $data = $filmService->filmCreate($this->title, $this->description, $this->duration, $this->poster);
        Film::class::create($data);
    }

    public function submitShowTime($movieId): void
    {
        $showTimeService = new ShowTimeService();
        $data = $showTimeService->showTimeCreate($this->startTime, $this->hall, $movieId);
        ShowTime::class::create($data);
    }

    public function deleteFilm($idFilm): void
    {
        Film::class::find($idFilm)->delete();
    }

    public function showTimeDel($showId): void
    {
        ShowTime::class::find($showId)->delete();
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.session-grid', ['films' => Film::class::get(), 'hallsShow' => Hall::class::get(), 'showTimes' => ShowTime::class::get()]);
    }
}
