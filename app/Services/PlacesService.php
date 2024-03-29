<?php

namespace App\Services;


use App\Models\Hall;
use App\Models\Place;
use Illuminate\Support\Facades\DB;

class PlacesService
{

    public function regPlaces($validatedData)
    {
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
        return $hall;
    }

    public function typePlaces($id): void
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
    }


    public function save($vipPlaces, $standartPlaces, $priceVip, $priceStandart): void
    {
        foreach ($vipPlaces as $vipPlace) {
            $vipPlace->price = $priceVip;
            $vipPlace->save();
        }
        foreach ($standartPlaces as $standartPlace) {
            $standartPlace->price = $priceStandart;
            $standartPlace->save();
        }
    }

    public function clear($places): void
    {
        foreach ($places as $place) {
            $place->price = 0;
            $place->save();
        }
    }


}
