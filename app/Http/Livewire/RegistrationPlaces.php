<?php

namespace App\Http\Livewire;

use App\Models\Hall;
use App\Models\Place;
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
        'name' => 'required|max:30',
        'rows' => 'required|min:1|max:30',
        'places' => 'required|min:1|max:100',
        'halls' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();
        $halls = Hall::class::get();
        $name = $validatedData["name"];
        $rows = $validatedData["rows"];
        $places = $validatedData["places"];
        Hall::class::where('name', $name)->update(['rows' => $rows]);
        Hall::class::where('name', $name)->update(['places' => $places]);
        $hall = Hall::class::where('name', $name)->first();
        $allPlaces = $hall->rows * $hall->places;
        DB::table('places')->where('hall_id', '=', $hall->id)->delete();
        for ($i = 0; $i < $allPlaces; $i++) {
            $hall->places()->create([
                'hall_id' => $hall->id
            ]);
        }
        $this->columns = $hall->places;
        $this->placesNew = $hall->places()->get();
        $this->places = $hall->places;
        $this->rows = $hall->rows;
    }


    public function configHall()
    {
        $hall = Hall::class::where('name', $this->name)->first();
        $this->columns = $hall->places;
        $this->placesNew = $hall->places()->get();
        $this->places = $hall->places;
        $this->rows = $hall->rows;
    }

    public function typePlace($id)
    {
        $place = Place::find($id);
        $type = $place->type;
        switch ($type) {
            case 'vip':
                $place->type = 'disabled';
                break;
            case 'standart':
                $place->type = 'vip';
                break;
            case 'disabled':
                $place->type = 'standart';
                break;
        }
        $place->save();
        $this->configHall();
    }


    public function render()
    {
        return view('livewire.registration-places');
    }
}
