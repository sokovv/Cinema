<?php

namespace App\Http\Livewire;

use App\Services\OpenSellService;
use Livewire\Component;

class OpenSale extends Component
{

    public $close = true;


    public function close(): void
    {
        $this->close = OpenSellService::openSellClose($this->close);
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.open-sale', ['close' => $this->close]);
    }
}
