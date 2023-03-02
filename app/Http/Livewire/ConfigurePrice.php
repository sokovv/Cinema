<?php

namespace App\Http\Livewire;

use App\Models\Hall;
use Livewire\Component;

class ConfigurePrice extends Component
{
    public $halls;
    public $priceVip;
    public $priceStandart;
    public $name;

    public $idHall;

    protected $rules = [
        'name' => 'required|max:30',
        'priceStandart' => 'required|min:0|max:5000',
        'priceVip' => 'required|min:0|max:10000',
        'halls' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function configHall($id)
    {
        $hall = Hall::find($id);
        $hall->places()->get();
        $vP = $hall->places()->where('type', 'vip')->first();
        $sP = $hall->places()->where('type', 'standart')->first();
        $this->idHall = $id;
        if ($vP !== null) {
            $this->priceVip = $vP->price;
        } else {
            $this->priceVip = 'нет кресел';
        }
        if ($sP !== null) {
            $this->priceStandart = $sP->price;
        } else {
            $this->priceStandart = 'нет кресел';
        }
    }

    public function save()
    {
        $hall = Hall::find($this->idHall);
        $hall->places()->get();
        $vipPlaces = $hall->places()->where('type', 'vip')->get();
        $standartPlaces = $hall->places()->where('type', 'standart')->get();

        foreach ($vipPlaces as $vipPlace) {
            $vipPlace->price = $this->priceVip;
            $vipPlace->save();
        }
        foreach ($standartPlaces as $standartPlace) {
            $standartPlace->price = $this->priceStandart;
            $standartPlace->save();
        }

    }

    public function clear()
    {
        $hall = Hall::find($this->idHall);
        $places = $hall->places()->get();
        foreach ($places as $place) {
            $place->price = 0;
            $place->save();
        }

    }

    public function render()
    {
        return view('livewire.configure-price');
    }
}
