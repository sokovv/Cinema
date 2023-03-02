<?php

namespace App\Http\Livewire;

use App\Models\Place;
use App\Models\ShowTime;
use App\Models\Ticket;
use Livewire\Component;
use stdClass;

class ChoosePlace extends Component
{
    public $show_time;
    public $taken = '_taken';
    public $row;
    public $arrRow = [];
    public $place;
    public $arrPlace = [];
    public $takenIdArr = [];


    protected $rules = [
        'show_time' => 'required|max:30',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function choosePlace($id, $number_row, $number_place)
    {
        array_push($this->takenIdArr, $id);
        array_push($this->arrRow, $number_row);
        array_push($this->arrPlace, $number_place);

    }


    public function render()
    {
        return view('livewire.choose-place', ['tickets' => Ticket::class::get()]);
    }
}
