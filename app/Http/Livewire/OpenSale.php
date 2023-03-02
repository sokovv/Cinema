<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OpenSale extends Component
{

    public $close = true;

    protected $rules = [

    ];



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function close()
    {
        if ($this->close === true) {
            $this->close = false;
        } else {
            $this->close = true;
        }
    
    }

    public function render()
    {
        return view('livewire.open-sale', ['close' => $this->close]);
    }
}
