<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Hall;
use App\Models\OpenSell;
use App\Models\ShowTime;
use App\Models\Ticket;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CinemaController extends Controller
{

    public $idTaken;
    public $ticketsPay;

    public function index(Request $request)
    {

        if (OpenSell::exists()) {
            $open_sell = OpenSell::class::first();
        } else {
            OpenSell::class::create();
        }

        $days = array('ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'ВС');
        $date = Carbon::now();
        $period = CarbonPeriod::create(Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek());

        $halls = Hall::class::get();
        $films = Film::class::get();
        return view('client.indexClient', ['days' => $days, 'date' => $date, 'period' => $period, 'films' => $films, 'halls' => $halls]);
    }

    public function hall($id)
    {
        Ticket::class::where('qr', '0')->delete();
        $show_time = ShowTime::class::find($id);
        return view('client.hall', ['show_time' => $show_time]);
    }


    public function payment($id, $row, $place, $arrTaken)
    {
        Ticket::class::where('qr', '0')->delete();
        $show_time = ShowTime::class::find($id);
        $row = json_decode($row);
        $place = json_decode($place);
        $arrTaken = json_decode($arrTaken);
        for ($i = 0; $i < count($row); $i++) {
            Ticket::class::create([
                'show_times_id' => $id,
                'places_id' => $arrTaken[$i],
                'films_id' => $show_time->film->id,
                'title' => $show_time->film->title,
                'row' => $row[$i],
                'place' => $place[$i],
            ]);
        }
        $this->ticketsPay = Ticket::class::where('qr', '0')->get();
        $sum = 0;
        foreach ($this->ticketsPay as $ticketSum) {
            $sum += $ticketSum->places->price;
        }

        return view('client.payment', ['sum' => $sum, 'tickets' => $this->ticketsPay, 'show_time' => $show_time]);
    }

    public function ticket($id)
    {
        $show_time = ShowTime::class::find($id);
        $this->ticketsPay = Ticket::class::where('qr', '0')->get();
        $text = null;
        foreach ($this->ticketsPay as $ticket) {
            $text .= "Row=$ticket->row, Place=$ticket->place, Show=$show_time->id||";
        }

        $tickets = Ticket::class::get();
        foreach ($tickets as $ticket) {
            $ticket->qr = 1;
            $ticket->save();
        }

        return view('client.ticket', ['text' => $text, 'tickets' => $this->ticketsPay, 'show_time' => $show_time]);
    }

}
