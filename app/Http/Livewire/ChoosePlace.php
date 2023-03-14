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


    public function choosePlace($id, $number_row, $number_place): void
    {
        array_push($this->takenIdArr, $id);
        array_push($this->arrRow, $number_row);
        array_push($this->arrPlace, $number_place);

    }


    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.choose-place', ['tickets' => Ticket::class::get()]);
    }
}
