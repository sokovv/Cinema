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
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public $ticketsPay;

    private $ticketService;

    public function __construct( TicketService $ticketServices)
    {
        $this->ticketService = $ticketServices;
    }

    public function payment($id, $row, $place, $arrTaken): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        Ticket::class::where('qr', '0')->delete();
        $showTime = $this->ticketService->ticketCreate($id, $row, $place, $arrTaken);

        $this->ticketsPay = Ticket::class::where('qr', '0')->get();
        $sum = $this->ticketService->ticketSum($this->ticketsPay);

        return view('client.payment', ['sum' => $sum, 'tickets' => $this->ticketsPay, 'show_time' => $showTime]);
    }

    public function ticket($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $showTime = ShowTime::class::find($id);
        $this->ticketsPay = Ticket::class::where('qr', '0')->get();
        $text = $this->ticketService->ticketText($this->ticketsPay, $showTime);
        $this->ticketService->ticketSave();

        return view('client.ticket', ['text' => $text, 'tickets' => $this->ticketsPay, 'show_time' => $showTime]);
    }

}
