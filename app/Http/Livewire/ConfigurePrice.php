<?php

namespace App\Http\Livewire;

use App\Models\Hall;
use App\Services\PriceService;
use Livewire\Component;

class ConfigurePrice extends Component
{
    public $halls;
    public $priceVip;
    public $priceStandart;
    public $name;

    public $idHall;

    protected $rules = [
        'priceStandart' => 'required|min:0|max:5000',
        'priceVip' => 'required|min:0|max:10000',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function configHall($id): void
    {
        $hall = Hall::find($id);
        $hall->places()->get();
        $vP = $hall->places()->where('type', 'vip')->first();
        $sP = $hall->places()->where('type', 'standart')->first();
        $this->idHall = $id;
        $this->priceVip = PriceService::priceVip($vP);
        $this->priceStandart = PriceService::priceStandart($sP);

    }

    public function save(): void
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

    public function clear(): void
    {
        $hall = Hall::find($this->idHall);
        $places = $hall->places()->get();
        foreach ($places as $place) {
            $place->price = 0;
            $place->save();
        }

    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.configure-price');
    }
}
