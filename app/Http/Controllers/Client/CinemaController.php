<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Hall;
use App\Models\ShowTime;
use App\Models\Ticket;
use App\Services\OpenSellService;
use App\Services\TicketService;
use App\Services\UserService;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CinemaController extends Controller
{

    public $idTaken;
    public $ticketsPay;

    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        UserService::userCreate();
        OpenSellService::openSell();

        $halls = Hall::class::get();
        $films = Film::class::get();
        return view('client.indexClient', ['films' => $films, 'halls' => $halls]);
    }

    public function hall($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        Ticket::class::where('qr', '0')->delete();
        $show_time = ShowTime::class::find($id);
        return view('client.hall', ['show_time' => $show_time]);
    }


    public function payment($id, $row, $place, $arrTaken): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        Ticket::class::where('qr', '0')->delete();
        $show_time = TicketService::ticketCreate($id, $row, $place, $arrTaken);

        $this->ticketsPay = Ticket::class::where('qr', '0')->get();
        $sum = TicketService::ticketSum($this->ticketsPay);

        return view('client.payment', ['sum' => $sum, 'tickets' => $this->ticketsPay, 'show_time' => $show_time]);
    }

    public function ticket($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $show_time = ShowTime::class::find($id);
        $this->ticketsPay = Ticket::class::where('qr', '0')->get();
        $text = TicketService::ticketText($this->ticketsPay, $show_time);
        TicketService::ticketSave();

        return view('client.ticket', ['text' => $text, 'tickets' => $this->ticketsPay, 'show_time' => $show_time]);
    }

}
