<?php

namespace App\Http\Livewire;

use App\Models\Hall;
use App\Services\PlacesService;
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

    public function updated($propertyName): void
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
        $priceService = new PriceService();
        $this->priceVip = $priceService->priceVip($vP);
        $this->priceStandart = $priceService->priceStandart($sP);

    }

    public function save(): void
    {
        $hall = Hall::find($this->idHall);
        $hall->places()->get();
        $vipPlaces = $hall->places()->where('type', 'vip')->get();
        $standartPlaces = $hall->places()->where('type', 'standart')->get();
        $placeService = new PlacesService();
        $placeService->save($vipPlaces, $standartPlaces, $this->priceVip, $this->priceStandart);


    }

    public function clear(): void
    {
        $hall = Hall::find($this->idHall);
        $places = $hall->places()->get();
        $placeService = new PlacesService();
        $placeService->clear($places);

    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.configure-price');
    }
}
