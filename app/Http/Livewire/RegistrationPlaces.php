<?php

namespace App\Http\Livewire;

use App\Models\Hall;
use App\Models\Place;
use App\Services\PlacesService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RegistrationPlaces extends Component
{
    public $name;

    public $rows;
    public $places;
    public $columns;
    public $placesNew;
    public $halls;

    protected $rules = [
        'name' => 'required|max:255',
        'rows' => 'required|min:1|max:30',
        'places' => 'required|min:1|max:100',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit(): void
    {
        $validatedData = $this->validate();
        $hall = PlacesService::regPlaces($validatedData);

        $this->columns = $hall->places;
        $this->placesNew = $hall->places()->get();
        $this->places = $hall->places;
        $this->rows = $hall->rows;
    }


    public function configHall(): void
    {
        $hall = Hall::class::where('name', $this->name)->first();
        $this->columns = $hall->places;
        $this->placesNew = $hall->places()->get();
        $this->places = $hall->places;
        $this->rows = $hall->rows;
    }

    public function typePlace($id): void
    {

     PlacesService::typePlaces($id);
        $this->configHall();
    }


    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.registration-places');
    }
}
